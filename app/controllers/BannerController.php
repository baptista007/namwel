<?php

/**
 * Eproc_contractors Page Controller
 * @category  Controller
 */
class BannerController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_banner;
        $this->fields = [
            "id",
            "title",
            "description",
            "image",
            "image_original_name",
            "created_date",
            "modified_date"
        ];
    }

    /**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
    function index($fieldname = null, $fieldvalue = null) {
        $request = $this->request;
        $db = $this->GetModel();
        $tablename = $this->tablename;
        $pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
        //search table record
        if (!empty($request->search)) {
            $text = trim($request->search);
            $search_condition = "(
				tbl_banner.title LIKE ? OR 
				tbl_banner.description LIKE ? 
			)";
            $search_params = array(
                "%$text%", "%$text%"
            );
            //setting search conditions
            $db->where($search_condition, $search_params);
            //template to use when ajax search
            $this->view->search_template = "banner/search.php";
        }

        if (!empty($request->orderby)) {
            $orderby = $request->orderby;
            $ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
            $db->orderBy($orderby, $ordertype);
        } else {
            $db->orderBy("tbl_banner.id", ORDER_TYPE);
        }

        if ($fieldname) {
            $db->where($fieldname, $fieldvalue); //filter by a single field name
        }

        $tc = $db->withTotalCount();
        $records = $db->get($tablename, $pagination, $this->fields);
        $records_count = count($records);
        $total_records = intval($tc->totalCount);
        $page_limit = $pagination[1];
        $total_pages = ceil($total_records / $page_limit);
        $data = new stdClass;
        $data->records = $records;
        $data->record_count = $records_count;
        $data->total_records = $total_records;
        $data->total_page = $total_pages;
        if ($db->getLastError()) {
            $this->set_page_error();
        }
        $page_title = $this->view->page_title = get_lang('banner_title');
        $this->view->report_filename = date('Y-m-d') . '-' . $page_title;
        $this->view->report_title = $page_title;
        $this->view->report_layout = "report_layout.php";
        $this->view->report_paper_size = "A4";
        $this->view->report_orientation = "portrait";
        $this->render_view("banner/list.php", $data); //render the full page
    }

    /**
     * View record detail 
     * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
    function view($rec_id = null, $value = null) {
        $request = $this->request;
        $db = $this->GetModel();
        $rec_id = $this->rec_id = urldecode($rec_id);
        $tablename = $this->tablename;
        if ($value) {
            $db->where($rec_id, urldecode($value)); //select record based on field name
        } else {
            $db->where("tbl_banner.id", $rec_id);
        }

        $record = $db->getOne($tablename, $this->fields);

        if ($record) {
            $page_title = $this->view->page_title = get_lang('view_eproc_contractors');
            $this->view->report_filename = date('Y-m-d') . '-' . $page_title;
            $this->view->report_title = $page_title;
            $this->view->report_layout = "report_layout.php";
            $this->view->report_paper_size = "A4";
            $this->view->report_orientation = "portrait";

            return $this->render_view("banner/view.php", $record);
        } else {
            if ($db->getLastError()) {
                $this->set_page_error();
            } else {
                $this->set_page_error(get_lang('no_record_found'));
            }

            return $this->render_view(RECORD_NOT_FOUND_PAGE);
        }
    }

    /**
     * Insert new record to the database table
     * @param $formdata array() from $_POST
     * @return BaseView
     */
    function add() {
        $this->manage();
    }

    /**
     * Update table record with formdata
     * @param $rec_id (select record by table primary key)
     * @param $formdata array() from $_POST
     * @return array
     */
    function edit($rec_id) {
        $this->manage($rec_id);
    }

    function manage($rec_id = null) {
        $db = $this->GetModel();

        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = array(
//                'title' => 'required',
//                'description' => 'required',
            );

            $this->sanitize_array = array(
                'title' => 'htmlencode',
                'description' => 'htmlencode',
            );

            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($rec_id) && empty($_FILES['image'])) {
                $errors[] = get_lang('image_required');
            }

            if (empty($errors)) {
                if (!empty($_FILES['image'])) {
                    $uploader = new Uploader();
                    $upload_config = Getters::$default_upload_config;
                    $upload_config['limit'] = 999;
                    $upload_data = $uploader->upload($_FILES['image'], $upload_config);

                    if ($upload_data['isComplete']) {
                        $filepaths = $upload_data['data']['metas'];
                    }

                    if ($upload_data['isSuccess']) {
                        if (!is_array($filepaths)) {
                            $filepaths = array($filepaths);
                        }

                        $file = $filepaths[0];

                        $modeldata['image'] = $file['name'];
                        $modeldata['image_original_name'] = $file['old_name'];

                        if (empty($rec_id)) {
                            $rec_id = $this->rec_id = $db->insert($this->tablename, $modeldata);
                        } else {
                            $db->where("id", $rec_id);
                            if (!$db->update($this->tablename, $modeldata)) {
                                $rec_id = null; //update failed
                            }
                        }

                        if (!$rec_id) {
                            $errors[] = get_lang('error_inserting_record');
                        }
                    } else {
                        if ($upload_data['hasErrors']) {
                            $upload_errors = $upload_data['errors'];
                            foreach ($upload_errors as $key => $val) {
                                //you can pass upload errors to the view
                                $errors[] = $val[0];
                            }
                        } else {
                            $errors[] = get_lang('additional_photos_upload_error');
                        }
                    }
                } else {
                    if (empty($rec_id)) {
                        $rec_id = $this->rec_id = $db->insert($this->tablename, $modeldata);
                    } else {
                        $db->where("id", $rec_id);
                        if (!$db->update($this->tablename, $modeldata)) {
                            $rec_id = null; //update failed
                        }
                    }

                    if (!$rec_id) {
                        $errors[] = get_lang('error_inserting_record');
                    }
                }
            }

            ajaxFormPostOutcome($errors, get_link("banner"));
            return;
        }

        if (!empty($rec_id)) {
            $db->where("id", $rec_id);
            $record = $db->getOne($this->tablename);
            if ($record) {
                $this->view->page_title = get_lang('edit_banner') . ': ' . $record['title'];
                $this->view->page_props = $record;
                return $this->render_view("banner/manage.php");
            } else {
                if ($db->getLastError()) {
                    $this->set_page_error();
                } else {
                    $this->set_page_error(get_lang('record_not_found'));
                }

                return $this->render_view(RECORD_NOT_FOUND_PAGE);
            }
        } else {
            $this->view->page_title = get_lang('new_banner');
            return $this->render_view("banner/manage.php");
        }
    }

    /**
     * Delete record from the database
     * Support multi delete by separating record id by comma.
     * @return BaseView
     */
    function delete($rec_id = null) {
        Csrf::cross_check();
        $request = $this->request;
        $db = $this->GetModel();
        $tablename = $this->tablename;
        $this->rec_id = $rec_id;
        //form multiple delete, split record id separated by comma into array
        $arr_rec_id = array_map('trim', explode(",", $rec_id));
        $db->where("tbl_banner.id", $arr_rec_id, "in");
        $bool = $db->delete($tablename);
        if ($bool) {
            $this->set_flash_msg(get_lang('record_deleted_successfully'), "success");
        } elseif ($db->getLastError()) {
            $page_error = $db->getLastError();
            $this->set_flash_msg($page_error, "danger");
        }
        return $this->redirect("banner");
    }

}
