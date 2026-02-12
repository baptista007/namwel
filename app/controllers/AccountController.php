<?php

/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_user;
        $this->fields = array("id",
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
    }

    /**
     * Index Action
     * @return null
     */
    function index() {
        $db = $this->GetModel();
        $rec_id = $this->rec_id = USER_ID; //get current user id from session
        $db->where("id", $rec_id);
        $tablename = $this->tablename;

        $user = $db->getOne($tablename, $this->fields);
        if (!empty($user)) {
            $page_title = $this->view->page_title = get_lang('my_account');
            $this->render_view("account/view.php", $user);
        } else {
            $this->set_page_error();
            $this->render_view("account/view.php");
        }
    }
    
    function edit() {
        $db = $this->GetModel();
        $rec_id = $this->rec_id = USER_ID;
        $tablename = $this->tablename;

        if (is_post_request()) {
            $errors = array();
            
            if (!Csrf::cross_check_ajax()) {
                return json_encode(array(
                    'success' => false,
                    'message' => XSS_DETECTED_MSG
                ));
            }
            
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = array(
                'name' => 'required',
                'surname' => 'required',
                'user_email' => 'required',
                'username' => 'required|numeric',
            );

            $this->sanitize_array = array(
                'name' => 'sanitize_string',
                'surname' => 'sanitize_string',
                'user_email' => 'sanitize_string',
                'username' => 'sanitize_string',
            );
            
            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            $db->where("id", $rec_id, "!=");
            $db->where("user_email", $modeldata['user_email']);
            
            if ($db->has($this->tablename)) {
                $errors[] = $modeldata['user_email'] . " " . get_lang("already_exists");
            }

            if (empty($errors)) {
                $db->where("id", $rec_id);
                if (!$db->update($this->tablename, $modeldata)) {
                    $errors[] = $db->getLastError();
                }
            }
            
            ajaxFormPostOutcome($errors, get_link("account/index"), get_lang("my_account"));
            return;
        }

        $db->where("id", $rec_id);
        $data = $db->getOne($tablename, $this->fields);

        if (!$data) {
            $this->set_page_error();
        }

        return $this->render_view("account/edit.php", $data);
    }

    /**
     * Change account email
     * @return BaseView
     */
    function change_password() {
        $db = $this->GetModel();
        
        $fields = $this->fields = $fields = array(
            "current_pwd",
            "password",
            "confirm_password",
        );
        
        if (is_post_request()) {
            $errors = array();
            
            if (!Csrf::cross_check_ajax()) {
                return json_encode(array(
                    'success' => false,
                    'message' => XSS_DETECTED_MSG
                ));
            }
            
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = array(
                'current_pwd' => 'required',
                'password' => 'required',
                'confirm_password' => 'required',
            );

            $this->sanitize_array = array(
                'current_pwd' => 'sanitize_string',
                'password' => 'sanitize_string',
                'confirm_password' => 'sanitize_string',
            );
            
            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);
            
            $db->where("id", USER_ID);
            $user = $db->getOne(SqlTables::tbl_user);
            
            if (!$user) {
                $errors[] = get_lang('record_not_found');
            }
            
            if ($modeldata['password'] != $modeldata['confirm_password']) {
                $errors[] = get_lang("passwords_dont_match");
            }
            
            if (!password_verify($modeldata['current_pwd'], $user['password_hash'])) {
                $errors[] = get_lang("password_incorrect");
            }
            
            if (empty($errors)) {
                $db->where("id", USER_ID);
                if (!$db->update($this->tablename, array('password_hash' => password_hash($modeldata['password'], PASSWORD_DEFAULT)))) {
                    $errors[] = $db->getLastError();
                }
            }
            
            ajaxFormPostOutcome($errors, get_link("account/index"), get_lang("my_account"));
            return;
        }
        
        return $this->render_view("account/change_password.php", null, "index_layout.php");
    }
}
