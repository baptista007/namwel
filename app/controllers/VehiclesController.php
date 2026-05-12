<?php

/**
 * VehiclesController — Admin Fleet Management
 * Handles CRUD operations for the vehicle/car-rental fleet.
 */
class VehiclesController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_vehicle;
        $this->fields = [
            "id", "make", "model", "year", "body_type", "seats",
            "transmission", "fuel_type", "price_per_day", "mileage",
            "description", "features", "cover_image",
            "cover_image_original_name", "status", "modified_date"
        ];
    }

    /**
     * List all vehicles with search + pagination
     */
    function index($fieldname = null, $fieldvalue = null) {
        $request  = $this->request;
        $db       = $this->GetModel();

        $pagination = $this->get_pagination(MAX_RECORD_COUNT);

        if (!empty($request->search)) {
            $text = trim($request->search);
            $db->where(
                "(tbl_vehicle.make LIKE ? OR tbl_vehicle.model LIKE ? OR tbl_vehicle.year LIKE ?)",
                ["%$text%", "%$text%", "%$text%"]
            );
            $this->view->search_template = "vehicles/search.php";
        }

        if (!empty($request->orderby)) {
            $db->orderBy($request->orderby, (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE));
        } else {
            $db->orderBy("tbl_vehicle.id", ORDER_TYPE);
        }

        if ($fieldname) {
            $db->where($fieldname, $fieldvalue);
        }

        $tc            = $db->withTotalCount();
        $records       = $db->get($this->tablename, $pagination, $this->fields);
        $records_count = count($records);
        $total_records = intval($tc->totalCount);
        $page_limit    = $pagination[1];
        $total_pages   = ceil($total_records / $page_limit);

        $data                = new stdClass;
        $data->records       = $records;
        $data->record_count  = $records_count;
        $data->total_records = $total_records;
        $data->total_page    = $total_pages;

        if ($db->getLastError()) {
            $this->set_page_error();
        }

        $this->view->page_title = get_lang('fleet_page_title');
        $this->render_view("vehicles/list.php", $data);
    }

    /**
     * Add — delegates to manage()
     */
    function add() {
        $this->manage();
    }

    /**
     * Edit — delegates to manage($id)
     */
    function edit($rec_id) {
        $this->manage($rec_id);
    }

    /**
     * Shared add / edit handler
     */
    function manage($rec_id = null) {
        $db = $this->GetModel();

        if (is_post_request()) {
            $errors   = [];
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = [
                'make'          => 'required',
                'model'         => 'required',
                'year'          => 'required|numeric',
                'price_per_day' => 'required|numeric',
            ];

            $this->sanitize_array = [
                'make'        => 'sanitize_string',
                'model'       => 'sanitize_string',
                'mileage'     => 'sanitize_string',
                'description' => 'htmlencode',
                'features'    => 'htmlencode',
            ];

            $this->filter_vals = true;
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($errors)) {
                $db->startTransaction();

                if (empty($rec_id)) {
                    $rec_id = $this->rec_id = $db->insert($this->tablename, $modeldata);
                } else {
                    $db->where("id", $rec_id);
                    if (!$db->update($this->tablename, $modeldata)) {
                        $rec_id = null;
                    }
                }

                if ($rec_id) {
                    // Handle cover image upload
                    if (!empty($_FILES['cover_image']) && !empty($_FILES['cover_image']['name'])) {
                        $uploader     = new Uploader();
                        $upload_config = Getters::$default_upload_config;
                        $upload_config['extensions'] = ['jpeg', 'jpg', 'png', 'webp'];
                        $upload_config['limit']      = 1;
                        $upload_data  = $uploader->upload($_FILES['cover_image'], $upload_config);

                        if ($upload_data['isSuccess']) {
                            $file = $upload_data['data']['metas'][0];
                            $db->where("id", $rec_id);
                            if (!$db->update($this->tablename, [
                                'cover_image'               => $file['name'],
                                'cover_image_original_name' => $file['old_name'],
                            ])) {
                                $errors[] = $db->getLastError();
                            }
                        } elseif ($upload_data['hasErrors']) {
                            foreach ($upload_data['errors'] as $val) {
                                $errors[] = $val[0];
                            }
                        }
                    }
                } else {
                    $errors[] = get_lang('error_inserting_record');
                }

                if (empty($errors)) {
                    $db->commit();
                } else {
                    $db->rollback();
                }
            }

            ajaxFormPostOutcome($errors, get_link("vehicles"));
            return;
        }

        // GET — load existing record for edit
        if (!empty($rec_id)) {
            $db->where("id", $rec_id);
            $record = $db->getOne($this->tablename);

            if ($record) {
                $this->view->page_title = get_lang('fleet_edit') . ': ' . $record['make'] . ' ' . $record['model'];
                $this->view->page_props = $record;
                return $this->render_view("vehicles/manage.php");
            } else {
                $this->set_page_error($db->getLastError() ?: get_lang('record_not_found'));
                return $this->render_view(RECORD_NOT_FOUND_PAGE);
            }
        } else {
            $this->view->page_title = get_lang('fleet_add');
            return $this->render_view("vehicles/manage.php");
        }
    }

    /**
     * Toggle active / inactive status
     */
    function toggle_status($rec_id = null) {
        Csrf::cross_check();
        $db = $this->GetModel();
        $db->where("id", $rec_id);
        $record = $db->getOne($this->tablename, ["id", "status"]);

        if ($record) {
            $new_status = ($record['status'] == Status::active) ? Status::inactive : Status::active;
            $db->where("id", $rec_id);
            $db->update($this->tablename, ['status' => $new_status]);
            $this->set_flash_msg(get_lang('record_updated_successfully'), "success");
        } else {
            $this->set_flash_msg(get_lang('record_not_found'), "danger");
        }

        return $this->redirect("vehicles");
    }

    /**
     * Delete vehicle (supports comma-separated multi-delete)
     */
    function delete($rec_id = null) {
        Csrf::cross_check();
        $db         = $this->GetModel();
        $arr_rec_id = array_map('trim', explode(",", $rec_id));

        $db->where("id", $arr_rec_id, "in");
        if ($db->delete($this->tablename)) {
            $this->set_flash_msg(get_lang('record_deleted_successfully'), "success");
        } else {
            $this->set_flash_msg($db->getLastError(), "danger");
        }

        return $this->redirect("vehicles");
    }

    /**
     * Remove cover image only
     */
    function delete_cover_image($rec_id = null) {
        Csrf::cross_check();
        $request = $this->request;
        $db      = $this->GetModel();
        $db->where("id", $rec_id);
        $record = $db->getOne($this->tablename);

        if ($record && !empty($record['cover_image'])) {
            @unlink(UPLOAD_FILE_DIR . $record['cover_image']);
            $db->where("id", $rec_id);
            $db->update($this->tablename, [
                'cover_image'               => null,
                'cover_image_original_name' => null,
            ]);
        }

        $this->set_flash_msg(get_lang('record_deleted_successfully'), "success");
        return $this->redirect(isset($request->redirect) ? $request->redirect : 'vehicles');
    }
}
