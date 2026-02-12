<?php

/**
 * Trq_users Page Controller
 * @category  Controller
 */
class UserController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_user;
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
        $fields = array("id",
            "name",
            "surname",
            "username",
            "user_email",
            "user_account_status",
            "role_id",
            "user_failed_logins",
            "user_last_failed_login",
            "created",
            "modified"
        );
        $pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
        //search table record
        if (!empty($request->search)) {
            $text = trim($request->search);
            $search_condition = "(
				tbl_user.id LIKE ? OR 
				tbl_user.name LIKE ? OR 
				tbl_user.surname LIKE ? OR 
				tbl_user.username LIKE ? OR 
				tbl_user.user_email LIKE ? OR 
				tbl_user.password_hash LIKE ? OR 
				tbl_user.user_account_status LIKE ? OR 
				tbl_user.role_id LIKE ? OR 
				tbl_user.user_failed_logins LIKE ? OR 
				tbl_user.user_last_failed_login LIKE ? OR 
				tbl_user.created LIKE ? OR 
				tbl_user.modified LIKE ? OR 
				tbl_user.account_status LIKE ?
			)";
            $search_params = array(
                "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%"
            );
            //setting search conditions
            $db->where($search_condition, $search_params);
            //template to use when ajax search
            $this->view->search_template = "tbl_user/search.php";
        }
        if (!empty($request->orderby)) {
            $orderby = $request->orderby;
            $ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
            $db->orderBy($orderby, $ordertype);
        } else {
            $db->orderBy("tbl_user.id", ORDER_TYPE);
        }
        if ($fieldname) {
            $db->where($fieldname, $fieldvalue); //filter by a single field name
        }

        $tc = $db->withTotalCount();
        $records = $db->get($tablename, $pagination, $fields);
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
        $page_title = $this->view->page_title = "Users";
        $this->view->report_filename = date('Y-m-d') . '-' . $page_title;
        $this->view->report_title = $page_title;
        $this->view->report_layout = "report_layout.php";
        $this->view->report_paper_size = "A4";
        $this->view->report_orientation = "portrait";
        $this->render_view("user/list.php", $data); //render the full page
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
        $data = new stdClass();

        if (is_post_request()) {
            $errors = array();
            if (!Csrf::cross_check_ajax()) {
                return json_encode(array(
                    'success' => false,
                    'message' => XSS_DETECTED_MSG
                ));
            }

            $this->fields = array("name", "surname", "username", "user_email", "password_hash", "user_account_status", "password", "confirm_password");
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = array(
                'name' => 'required',
                'surname' => 'required',
                'user_email' => 'required',
                'username' => 'required',
                'password' => 'required',
                'confirm_password' => 'required'
            );

            $this->sanitize_array = array(
                'name' => 'sanitize_string',
                'surname' => 'sanitize_string',
                'user_email' => 'sanitize_string',
                'username' => 'sanitize_string',
                'password' => 'sanitize_string',
                'confirm_password' => 'sanitize_string'
            );

            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            $db->where("user_email", $modeldata['user_email']);

            if (!empty($rec_id)) {
                $db->where("id", $rec_id, "!=");
            }

            if ($db->has($this->tablename)) {
                $errors[] = $modeldata['user_email'] . " " . get_lang("already_exists");
            }

            if ($modeldata['password'] != $modeldata['confirm_password']) {
                $errors[] = get_lang("passwords_dont_match");
            }

            if (empty($errors)) {
                if (empty($rec_id)) {
                    //Handle passwords
                    $modeldata['email_status'] = EmailStatus::verified;
                    $modeldata['user_account_status'] = AccountStatus::active;
                    $modeldata['role_id'] = UserAccountType::backoffice;
                    $modeldata['password_hash'] = password_hash($modeldata['password'], PASSWORD_DEFAULT);

                    unset($modeldata['password']);
                    unset($modeldata['confirm_password']);

                    $rec_id = $this->rec_id = $db->insert($this->tablename, $modeldata);
                } else {

                    if (!empty($modeldata['password'])) {
                        $modeldata['password_hash'] = password_hash($modeldata['password'], PASSWORD_DEFAULT);

                        unset($modeldata['password']);
                        unset($modeldata['confirm_password']);
                    }

                    $db->where("id", $rec_id);
                    if (!$db->update($this->tablename, $modeldata)) {
                        $rec_id = null; //update failed
                    }
                }

                if (empty($rec_id)) {
                    $errors[] = $db->getLastError();
                }
            }

            ajaxFormPostOutcome($errors, get_link("user"));
            return;
        }

        if (!empty($rec_id)) {
            $db->where("id", $rec_id);
            $record = $db->getOne($this->tablename);

            if ($record) {
                $data->record = $record;
                $this->view->page_props = $record;
                $this->view->page_title = "Edit User";
                return $this->render_view("user/manage.php", $data);
            } else {
                if ($db->getLastError()) {
                    $this->set_page_error();
                } else {
                    $this->set_page_error(get_lang('record_not_found'));
                }

                return $this->render_view("errors/error_general.php", $record);
            }
        } else {
            $this->view->page_title = "Add User";
            return $this->render_view("user/manage.php", $data);
        }
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
        $fields = array("id",
            "name",
            "surname",
            "username",
            "user_email",
            "user_account_status",
            "role_id",
            "user_failed_logins",
            "user_last_failed_login",
            "created",
            "modified"
        );

        if ($value) {
            $db->where($rec_id, urldecode($value)); //select record based on field name
        } else {
            $db->where("tbl_user.id", $rec_id);
            ; //select record based on primary key
        }
        $record = $db->getOne($tablename, $fields);
        if ($record) {
            $this->view->page_title = "View  User";
        } else {
            if ($db->getLastError()) {
                $this->set_page_error();
            } else {
                $this->set_page_error("No record found");
            }
        }
        return $this->render_view("user/view.php", $record);
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
        $db->where("tbl_user.id", $arr_rec_id, "in");
        $bool = $db->delete($tablename);
        if ($bool) {
            $this->set_flash_msg("Record deleted successfully", "success");
        } elseif ($db->getLastError()) {
            $page_error = $db->getLastError();
            $this->set_flash_msg($page_error, "danger");
        }
        return $this->redirect("users");
    }

}
