<?php

/**
 * Eproc_contractors Page Controller
 * @category  Controller
 */
class ClientController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_client;
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
        $fields = array(
            "id",
            "name",
            "path",
            "original_name",
        );
        $pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
        //search table record
        if (!empty($request->search)) {
            $text = trim($request->search);
            $search_condition = "(
				tbl_client.id LIKE ? OR 
				tbl_client.name LIKE ? OR 
				tbl_client.path LIKE ? OR 
				tbl_client.original_name LIKE ? 
			)";
            $search_params = array(
                "%$text%", "%$text%", "%$text%", "%$text%"
            );
            //setting search conditions
            $db->where($search_condition, $search_params);
            //template to use when ajax search
            $this->view->search_template = "client/search.php";
        }

        if (!empty($request->orderby)) {
            $orderby = $request->orderby;
            $ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
            $db->orderBy($orderby, $ordertype);
        } else {
            $db->orderBy("tbl_client.id", ORDER_TYPE);
        }

        if ($fieldname) {
            $db->where($fieldname, $fieldvalue); //filter by a single field name
        }

        $tc = $db->withTotalCount();
        $records = $db->get($tablename, $pagination, [
            "tbl_client.id",
            "tbl_client.name",
            "tbl_client.path",
            "tbl_client.original_name",
            "tbl_client.created_date",
            "tbl_client.modified_date",
        ]);
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
        $page_title = $this->view->page_title = get_lang('client');
        $this->view->report_filename = date('Y-m-d') . '-' . $page_title;
        $this->view->report_title = $page_title;
        $this->view->report_layout = "report_layout.php";
        $this->view->report_paper_size = "A4";
        $this->view->report_orientation = "portrait";
        $this->render_view("client/list.php", $data); //render the full page
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
        $fields = array(
            "id",
            "name",
            "path",
            "original_name",
            "created_date",
            "modified_date"
        );
        if ($value) {
            $db->where($rec_id, urldecode($value)); //select record based on field name
        } else {
            $db->where("tbl_client.id", $rec_id);
            ; //select record based on primary key
        }
        $record = $db->getOne($tablename, $fields);
        if ($record) {
            $page_title = $this->view->page_title = get_lang('view_eproc_contractors');
            $this->view->report_filename = date('Y-m-d') . '-' . $page_title;
            $this->view->report_title = $page_title;
            $this->view->report_layout = "report_layout.php";
            $this->view->report_paper_size = "A4";
            $this->view->report_orientation = "portrait";
        } else {
            if ($db->getLastError()) {
                $this->set_page_error();
            } else {
                $this->set_page_error(get_lang('no_record_found'));
            }
        }
        return $this->render_view("client/view.php", $record);
    }

    /**
     * Insert new record to the database table
     * @param $formdata array() from $_POST
     * @return BaseView
     */
    function add($formdata = null) {
        $db = $this->GetModel();

        if (is_post_request()) {
            $errors = [];

            $fields = $this->fields = array(
                "name",
            );
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = array(
                'name' => 'required',
            );
            $this->sanitize_array = array(
                'name' => 'sanitize_string',
            );

            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($errors)) {
                $file_array = [
                    FileType::logo => 'logo',
                ];

                $upload_config = Getters::$default_upload_config;

                foreach ($file_array as $key => $name) {
                    if (!empty($_FILES[$name])) {
                        $uploader = new Uploader();
                        $upload_data = $uploader->upload($_FILES[$name], $upload_config);

                        if ($upload_data['isComplete']) {
                            $filepaths = $upload_data['data']['metas'];
                        }

                        if ($upload_data['isSuccess']) {
                            $db = PDODb::getInstance();

                            if (!is_array($filepaths)) {
                                $filepaths = array($filepaths);
                            }

                            foreach ($filepaths as $file) {
                                $data = array(
                                    'name' => $modeldata['name'],
                                    'path' => $file['name'],
                                    'original_name' => $file['old_name']
                                );

                                if (!$db->insert($this->tablename, $data)) {
                                    $errors[] = $db->getLastError();
                                }
                            }
                        } else {
                            if ($upload_data['hasErrors']) {
                                $upload_errors = $upload_data['errors'];
                                foreach ($upload_errors as $key => $val) {
                                    //you can pass upload errors to the view
                                    $errors[] = $val[0];
                                }
                            } else {
                                $errors[] = "Upload encountered an error.";
                            }
                        }
                    }
                }
            }

            ajaxFormPostOutcome($errors, get_link("client"));
            return;
        }

        $this->view->page_title = get_lang('new_client');
        $this->render_view("client/add.php");
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
        $db->where("tbl_client.id", $arr_rec_id, "in");
        $bool = $db->delete($tablename);
        if ($bool) {
            $this->set_flash_msg(get_lang('record_deleted_successfully'), "success");
        } elseif ($db->getLastError()) {
            $page_error = $db->getLastError();
            $this->set_flash_msg($page_error, "danger");
        }
        return $this->redirect("client");
    }

}
