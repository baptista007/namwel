<?php

/**
 * Guaranteed Trips Admin Controller
 * @category Controller
 */
class GuaranteedtripController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_guaranteed_trip;
        $this->fields = [
            "id",
            "title",
            "subtitle",
            "destination",
            "departure_date",
            "end_date",
            "duration",
            "price",
            "price_currency",
            "price_label",
            "spots_available",
            "spots_left",
            "cover_image",
            "badge",
            "status",
            "created_date",
            "modified_date"
        ];
    }

    function index($fieldname = null, $fieldvalue = null) {
        $request = $this->request;
        $db = $this->GetModel();
        $tablename = $this->tablename;
        $pagination = $this->get_pagination(MAX_RECORD_COUNT);

        if (!empty($request->search)) {
            $text = trim($request->search);
            $db->where(
                "(tbl_guaranteed_trip.title LIKE ? OR tbl_guaranteed_trip.destination LIKE ?)",
                ["%$text%", "%$text%"]
            );
            $this->view->search_template = "guaranteed_trip/search.php";
        }

        if (!empty($request->orderby)) {
            $db->orderBy($request->orderby, (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE));
        } else {
            $db->orderBy("tbl_guaranteed_trip.departure_date", "ASC");
        }

        if ($fieldname) {
            $db->where($fieldname, $fieldvalue);
        }

        $tc = $db->withTotalCount();
        $records = $db->get($tablename, $pagination, $this->fields);
        $records_count = count($records);
        $total_records = intval($tc->totalCount);
        $total_pages = ceil($total_records / $pagination[1]);

        $data = new stdClass;
        $data->records = $records;
        $data->record_count = $records_count;
        $data->total_records = $total_records;
        $data->total_page = $total_pages;

        if ($db->getLastError()) {
            $this->set_page_error();
        }

        $this->view->page_title = get_lang('gtrip_admin_title');
        $this->render_view("guaranteed_trip/list.php", $data);
    }

    function add() {
        $this->manage();
    }

    function edit($rec_id) {
        $this->manage($rec_id);
    }

    function manage($rec_id = null) {
        $db = $this->GetModel();

        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = [
                'title'          => 'required',
                'departure_date' => 'required',
            ];

            $this->sanitize_array = [
                'title'       => 'htmlencode',
                'subtitle'    => 'htmlencode',
                'destination' => 'htmlencode',
                'duration'    => 'htmlencode',
                'price_label' => 'htmlencode',
                'badge'       => 'htmlencode',
            ];

            $this->filter_vals = true;
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            // Handle cover image upload (optional on edit)
            if (!empty($_FILES['cover_image']['name'])) {
                $uploader = new Uploader();
                $upload_config = Getters::$default_upload_config;
                $upload_config['extensions'] = ['jpeg', 'jpg', 'png', 'webp'];
                $upload_config['limit'] = 1;
                $upload_data = $uploader->upload($_FILES['cover_image'], $upload_config);

                if ($upload_data['isSuccess']) {
                    $file = $upload_data['data']['metas'][0];
                    $modeldata['cover_image'] = $file['name'];
                } elseif ($upload_data['hasErrors']) {
                    foreach ($upload_data['errors'] as $errs) {
                        $errors[] = $errs[0];
                    }
                }
            }

            if (empty($errors)) {
                if (empty($rec_id)) {
                    $rec_id = $this->rec_id = $db->insert($this->tablename, $modeldata);
                } else {
                    $db->where("id", $rec_id);
                    if (!$db->update($this->tablename, $modeldata)) {
                        $rec_id = null;
                    }
                }

                if (!$rec_id) {
                    $errors[] = get_lang('error_inserting_record');
                }
            }

            ajaxFormPostOutcome($errors, get_link("guaranteedtrip"));
            return;
        }

        if (!empty($rec_id)) {
            $db->where("id", $rec_id);
            $record = $db->getOne($this->tablename);
            if ($record) {
                $this->view->page_title = get_lang('gtrip_edit') . ': ' . html_entity_decode($record['title']);
                $this->view->page_props = $record;
                return $this->render_view("guaranteed_trip/manage.php");
            } else {
                $this->set_page_error(get_lang('record_not_found'));
                return $this->render_view(RECORD_NOT_FOUND_PAGE);
            }
        } else {
            $this->view->page_title = get_lang('gtrip_add');
            return $this->render_view("guaranteed_trip/manage.php");
        }
    }

    function delete($rec_id = null) {
        Csrf::cross_check();
        $db = $this->GetModel();
        $arr_rec_id = array_map('trim', explode(",", $rec_id));
        $db->where("tbl_guaranteed_trip.id", $arr_rec_id, "in");
        $bool = $db->delete($this->tablename);
        if ($bool) {
            $this->set_flash_msg(get_lang('record_deleted_successfully'), "success");
        } elseif ($db->getLastError()) {
            $this->set_flash_msg($db->getLastError(), "danger");
        }
        return $this->redirect("guaranteedtrip");
    }

}
