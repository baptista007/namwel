<?php 

/**
 * Home Page Controller
 * @category  Controller
 */
class AdminController extends SecureController {
	function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_user;
    }

    /**
     * Index Action 
     * @return null
     */
    function index() {
        $this->view->page_title = "Admin Dashboard";
        $this->render_view("admin/index.php", null, "main_layout.php");
    }

    private function login_user($username, $password_text, $rememberme = false) {
        $db = $this->GetModel();
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $tablename = $this->tablename;
        $query = "SELECT * 
                FROM $tablename
                WHERE role_id = ?
                AND (username = ? OR user_email = ?)";
        $user = $db->rawQueryOne($query, [UserAccountType::backoffice, $username, $username]);

        $errors = array();
        $redirect_url = null;
        
        if (!empty($user)) {
            //Verify User Password Text With DB Password Hash Value.
            //Uses PHP password_verify() function with default options
            $password_hash = $user['password_hash'];
            
            if (password_verify($password_text, $password_hash)) {
                //check if user account has been activated by administrator
                if ($user['user_account_status'] != AccountStatus::active) {
                    return $this->login_fail(get_lang("account_inactive"));
                }
                
                unset($user['password_hash']); //Remove user password. No need to store it in the session
                set_session("user_data", $user); // Set active user data in a sessions
                
                //if Remeber Me, Set Cookie
                if ($rememberme == true) {
                    $sessionkey = time() . random_str(20); // Generate a session key for the user
                    //Update user session info in database with the session key
                    $db->where("id", $user['id']);
                    $res = $db->update($tablename, array("login_session_key" => hash_value($sessionkey)));
                    if (!empty($res)) {
                        set_cookie("login_session_key", $sessionkey); // save user login_session_key in a Cookie
                    }
                } else {
                    clear_cookie("login_session_key"); // Clear any previous set cookie
                }
                
                $redirect_url = get_session("login_redirect_url"); // Redirect to user active page

                if (!empty($$redirect_url) && $redirect_url != 'admin/login') {
                    clear_session("login_redirect_url");
                    $redirect_url = $redirect_url;
                } else {
                    $redirect_url = get_link("admin");
                }
                
            } else {
                //password is not correct
                $errors[] = get_lang("username_password_incorrect");
            }
        } else {
            //user is not registered
            $errors[] = get_lang("user_account_doesnt_exist");
        }

        ajaxFormPostOutcome($errors, $redirect_url, "Welcome");
        return;
    }

    /**
     * Display login page with custom message when login fails
     * @return BaseView
     */
    private function login_fail($page_error = null) {
        $this->set_page_error($page_error);
        $this->render_view("admin/login.php", null);
    }

    /**
     * Login Action
     * If Not $_POST Request, Display Login Form View
     * @return View
     */
    function login() {
        if (is_post_request()) {
            $modeldata = $this->modeldata = $_POST;
            $username = trim($modeldata['username']);
            $password = $modeldata['password'];
            $rememberme = (!empty($modeldata['rememberme']) ? $modeldata['rememberme'] : false);
            $this->login_user($username, $password, $rememberme);
        } else {
            $this->render_view("admin/login.php", null, 'login_layout.php');
        }
    }

    /**
     * Logout Action
     * Destroy All Sessions And Cookies
     * @return View
     */
    function logout($arg = null) {
        Csrf::cross_check();
        session_destroy();
        clear_cookie("login_session_key");
        set_flash_msg('User logged out');
        $this->redirect('admin/login');
    }
    
    function core() {
        $db = $this->GetModel();
        $data = $db->getOne(SqlTables::tbl_core);
        
        if (is_post_request()) {
            $errors = array();
            //fillable fields
            $fields = $this->fields = array(
                'site_name',
                'tel',
                'tel2',
                'support_tel',
                'email',
                'email2',
                'support_email',
                'street_address',
                'street_address_2',
                'street_address_3',
                'about_us'
            );
            
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = array(
                'about_us' => 'required',
            );

            $this->sanitize_array = array(
                'about_us' => 'htmlencode',
                'tel' => 'sanitize_string',
                'tel2' => 'sanitize_string',
                'support_tel' => 'sanitize_string',
                'email' => 'sanitize_string',
                'email2' => 'sanitize_string',
                'support_email' => 'sanitize_string',
                'street_address' => 'sanitize_string',
                'street_address_2' => 'sanitize_string',
                'street_address_3' => 'sanitize_string'
            );
            
            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }
            
            if (empty($errors)) {
                $db->where("id", 1);
                if (!$db->update(SqlTables::tbl_core, $modeldata)) {
                    $errors[] = $db->getLastError();
                }
            }
            
            ajaxFormPostOutcome($errors, get_link("admin/core"));
            return;
        }
        
        $this->view->page_props = $data;
        $this->view->page_title = 'Configuração Geral';
        $this->render_view("admin/core.php", $data);
    }
    
    function contacts() {
        $db = $this->GetModel();
        
        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);
            
            $this->fields = [
                'tel',
                'mobile',
                'whatsapp',
                'facebook',
                'instagram',
                'youtube',
                'tiktok',
                'email',
            ];
            
            $this->rules_array = [];

            $this->sanitize_array = array(
                'tel' => 'sanitize_string',
                'mobile' => 'sanitize_string',
                'whatsapp' => 'sanitize_string',
                'facebook' => 'sanitize_string',
                'instagram' => 'sanitize_string',
                'youtube' => 'sanitize_string',
                'tiktok' => 'sanitize_string',
                'email' => 'sanitize_string', 
            );
            
            $this->filter_vals = false; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (empty($this->view->page_error)) {
                $design_opts = [];

                foreach ($this->fields as $dfield) {
                    $design_opts[$dfield] = $modeldata[$dfield];
                }
                
                $db->where("id", 1);
                if (!$db->update(SqlTables::tbl_core, ['contacts' => json_encode($design_opts)])) {
                    $errors[] = $db->getLastError();
                }
            } else {
                $errors = $this->view->page_error;
            }
            
            ajaxFormPostOutcome($errors, get_link("admin/contacts"));
            return;
        }
        
        $data = $db->getOne(SqlTables::tbl_core);
        $this->view->page_props = json_decode($data['contacts'], true);
        $this->view->page_title = 'Contatos';
        $this->render_view("admin/contacts.php", $data);
    }
}
