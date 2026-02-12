
<?php
/**
 * Payment Controller (Public Website)
 * @category Controller
 */
class PaymentController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->page_title = SITE_NAME . " - Payment";
        $this->render_view("payment/index.php", null, "welcome_layout.php");
    }
}