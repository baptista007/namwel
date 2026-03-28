<?php
/**
 * Payment Controller (Public Website)
 * Validates a payment security code and redirects to the payment gateway.
 * @category Controller
 */
class PaymentController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->tablename = SqlTables::tbl_payment_security;
    }

    function index()
    {
        if (is_post_request()) {
            $code = trim(strip_tags($_POST['payment_code'] ?? ''));

            if (empty($code)) {
                $this->view->page_error = ['Please enter your payment security code.'];
                $this->view->page_title = SITE_NAME . " - Payment";
                return $this->render_view("payment/index.php", null, "welcome_layout.php");
            }

            $db = $this->GetModel();
            $db->where("payment_security_code", $code);
            $db->where("status", PaymentSecurityStatus::active);
            $record = $db->getOne($this->tablename, ["id", "payment_security_code", "status"]);

            if (empty($record)) {
                // Check if code exists but is already redeemed or expired
                $db->where("payment_security_code", $code);
                $existing = $db->getOne($this->tablename, ["status"]);

                if (!empty($existing)) {
                    if ($existing['status'] == PaymentSecurityStatus::redeemed) {
                        $this->view->page_error = ['This payment code has already been used.'];
                    } else {
                        $this->view->page_error = ['This payment code has expired.'];
                    }
                } else {
                    $this->view->page_error = ['Invalid payment code. Please check and try again.'];
                }

                $this->view->page_title = SITE_NAME . " - Payment";
                return $this->render_view("payment/index.php", null, "welcome_layout.php");
            }

            // Mark code as redeemed
            $db->where("id", $record['id']);
            $db->update($this->tablename, [
                'status'        => PaymentSecurityStatus::redeemed,
                'modified_date' => date('Y-m-d H:i:s'),
            ]);

            // Redirect to payment gateway
            header('Location: https://paylink.paygate.co.za?p1=N264');
            exit;
        }

        $this->view->page_title = SITE_NAME . " - Payment";
        $this->render_view("payment/index.php", null, "index_layout.php");
    }
}
