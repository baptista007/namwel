<?php

/**
 * Extends to Application Base Controller.
 * Page Controllers which need page authentication and authorization can extend to this class 
 */
class PublicSecureController extends BaseController {

    function __construct() {
        parent::__construct();
        // Page actions which do not require authentication.
        $exclude_pages = array(
            "index/index",
            "index/login",
            "index/register",
            "index/logout",
            "index/tenders",
        );
        
        $url = Router :: $page_url;

        if (!empty($url)) {
            $url_segment = $url_segment = explode("/", rtrim($url, "/"));
            $controller = strtolower(!empty($url_segment[0]) ? $url_segment[0] : null);
            $action = strtolower((!empty($url_segment[1]) ? $url_segment[1] : "index"));
            $page = "$controller/$action";
            
            if (!in_array($page, $exclude_pages)) {
                if ($this->authenticate_user()) {
                    $this->status = AUTHORIZED;
                } else {
                    $this->status = UNAUTHORIZED;
                    set_session("login_redirect_url", get_current_url());
                    $this->redirect('index/login');
                }
            }
        }
    }

    /**
     * Authenticate And Check User Page Access Eligibility
     * @return  Redirect to Login Page Or Displays Error Message When user access control authorization Fails
     */
    private function authenticate_user() {
        if (public_user_login_status() == false) {
            //check if user has a login cookie
            $session_key = get_cookie("login_session_key");
            if (!empty($session_key)) {
                $db = $this->GetModel();
                $db->where("login_session_key", hash_value($session_key));
                $user = $db->getOne("__tablename");
                if (!empty($user)) {
                    set_session("pub_user_data", $user);
                }
            }
        }

        return public_user_login_status();
    }
}
