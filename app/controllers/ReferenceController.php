<?php

/**
 * Eproc_institutions Page Controller
 * @category  Controller
 */
class ReferenceController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_reference;

        $this->fields = [
            "id",
            "client_id",
            "name",
            "position",
            "message",
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
				tbl_reference.id LIKE ? OR 
				tbl_reference.name LIKE ? OR 
				tbl_reference.short_name LIKE ? OR 
				tbl_reference.created_date LIKE ? OR 
				tbl_reference.modified_date LIKE ?
			)";
            $search_params = array(
                "%$text%", "%$text%", "%$text%", "%$text%", "%$text%"
            );
            //setting search conditions
            $db->where($search_condition, $search_params);
            //template to use when ajax search
            $this->view->search_template = "reference/search.php";
        }
        if (!empty($request->orderby)) {
            $orderby = $request->orderby;
            $ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
            $db->orderBy($orderby, $ordertype);
        } else {
            $db->orderBy("tbl_reference.id", ORDER_TYPE);
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
        $page_title = $this->view->page_title = get_lang('tbl_reference');
        $this->view->report_filename = date('Y-m-d') . '-' . $page_title;
        $this->view->report_title = $page_title;
        $this->view->report_layout = "report_layout.php";
        $this->view->report_paper_size = "A4";
        $this->view->report_orientation = "portrait";
        $this->render_view("reference/list.php", $data); //render the full page
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
            $db->where("tbl_reference.id", $rec_id);
            ; //select record based on primary key
        }
        $record = $db->getOne($tablename, $this->fields);

        if ($record) {
            $page_title = $this->view->page_title = "View Institution - " . $record['name'];

            //Get users
            $db->where("institution_id", $rec_id);
            $users = $db->get("tbl_user");
            $record['users'] = $users;
            return $this->render_view("reference/view.php", $record);
        } else {
            if ($db->getLastError()) {
                $this->set_page_error();
            } else {
                $this->set_page_error(get_lang('no_record_found'));
            }

            return $this->render_view("errors/error_404.php", $record);
        }
    }

    /**
     * Insert new record to the database table
     * @param $formdata array() from $_POST
     * @return BaseView
     */
    function add($formdata = null) {
        $db = $this->GetModel();
        $rec_id = NULL;

        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = array(
                'name' => 'required',
                'short_name' => 'required',
                'physical_address' => 'required',
                'telephone' => 'required',
                'email' => 'required',
            );
            $this->sanitize_array = array(
                'name' => 'sanitize_string',
                'short_name' => 'sanitize_string',
                'physical_address' => 'sanitize_string',
                'telephone' => 'sanitize_string',
                'email' => 'sanitize_string'
            );

            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($errors)) {
                $rec_id = $this->rec_id = $db->insert('tbl_reference', $modeldata);

                if (!$rec_id) {
                    $errors[] = 'Error occured while creating public entity.';
                }
            }

            ajaxFormPostOutcome($errors, get_link("reference/view/" . $rec_id));
            return;
        }

        $page_title = $this->view->page_title = 'New Public Entity';
        $this->render_view("reference/add.php");
    }

    /**
     * Update table record with formdata
     * @param $rec_id (select record by table primary key)
     * @param $formdata array() from $_POST
     * @return array
     */
    function edit($rec_id = null, $formdata = null) {
        $request = $this->request;
        $db = $this->GetModel();
        $this->rec_id = $rec_id;
        $tablename = $this->tablename;

        if ($formdata) {
            $postdata = $this->format_request_data($formdata);
            $this->rules_array = array(
                'name' => 'required',
                'short_name' => 'required',
            );
            $this->sanitize_array = array(
                'name' => 'sanitize_string',
                'short_name' => 'sanitize_string',
            );
            $modeldata = $this->modeldata = $this->validate_form($postdata);
            if ($this->validated()) {
                $db->where("tbl_reference.id", $rec_id);
                ;
                $bool = $db->update($tablename, $modeldata);
                $numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
                if ($bool && $numRows) {
                    $this->set_flash_msg(get_lang('record_updated_successfully'), "success");
                    return $this->redirect("tbl_reference");
                } else {
                    if ($db->getLastError()) {
                        $this->set_page_error();
                    } elseif (!$numRows) {
                        //not an error, but no record was updated
                        $page_error = get_lang('no_record_updated');
                        $this->set_page_error($page_error);
                        $this->set_flash_msg($page_error, "warning");
                        return $this->redirect("tbl_reference");
                    }
                }
            }
        }
        $db->where("tbl_reference.id", $rec_id);
        ;
        $data = $db->getOne($tablename, $this->fields);
        $page_title = $this->view->page_title = get_lang('edit_tbl_reference');
        if (!$data) {
            $this->set_page_error();
        }
        return $this->render_view("reference/edit.php", $data);
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
        $db->where("tbl_reference.id", $arr_rec_id, "in");
        $bool = $db->delete($tablename);
        if ($bool) {
            $this->set_flash_msg(get_lang('record_deleted_successfully'), "success");
        } elseif ($db->getLastError()) {
            $page_error = $db->getLastError();
            $this->set_flash_msg($page_error, "danger");
        }
        return $this->redirect("tbl_reference");
    }

    function add_user($rec_id) {
        $db = $this->GetModel();
        $rec_id = $this->rec_id = urldecode($rec_id);
        $tablename = $this->tablename;
        $db->where("tbl_reference.id", $rec_id);
        $record = $db->getOne($tablename, $this->fields);

        if (is_post_request()) {
            $errors = [];
            $this->fields = array(
                "name",
                "surname",
                "username",
                "user_email",
                "password",
                "conf_password",
            );
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = array(
                'name' => 'required',
                'surname' => 'required',
                'username' => 'required',
                'user_email' => 'required',
                'password' => 'required',
                'conf_password' => 'required',
            );
            $this->sanitize_array = array(
                'name' => 'sanitize_string',
                'surname' => 'sanitize_string',
                'username' => 'sanitize_string',
                'user_email' => 'sanitize_string',
                'password' => 'sanitize_string',
                'conf_password' => 'sanitize_string',
            );

            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($errors)) {
                $modeldata['password_hash'] = password_hash($modeldata['password'], PASSWORD_DEFAULT);
                $modeldata['user_account_status'] = AccountStatus::active;
                $modeldata['role_id'] = UserAccountType::backoffice;
                $modeldata['email_status'] = EmailStatus::verified;
                $modeldata['institution_id'] = $rec_id;

                unset($modeldata['password']);
                unset($modeldata['conf_password']);

                $rec_id = $this->rec_id = $db->insert('tbl_user', $modeldata);

                if (!$rec_id) {
                    $errors[] = 'Error occured while creating public entity user.';
                }
            }

            ajaxFormPostOutcome($errors, get_link("reference/view/" . $rec_id));
            return;
        }

        return $this->render_view("reference/add_user.php", $record);
    }

}
