<?php

/**
 * Payment Security Controller (Admin)
 * Manages payment security codes linked to booking references
 * @category Controller
 */
class PaymentsecurityController extends SecureController
{
    function __construct()
    {
        parent::__construct();
        $this->tablename = SqlTables::tbl_payment_security;

        $this->fields = [
            'id',
            'booking_reference_number',
            'payment_security_code',
            'status',
            'created_date',
            'modified_date',
        ];
    }

    /**
     * List all payment security codes
     */
    function index($fieldname = null, $fieldvalue = null)
    {
        $request = $this->request;
        $db = $this->GetModel();
        $tablename = $this->tablename;
        $pagination = $this->get_pagination(MAX_RECORD_COUNT);

        if (!empty($request->search)) {
            $text = trim($request->search);
            $search_condition = "(
                tbl_payment_security.id LIKE ? OR
                tbl_payment_security.booking_reference_number LIKE ? OR
                tbl_payment_security.payment_security_code LIKE ?
            )";
            $search_params = ["%$text%", "%$text%", "%$text%"];
            $db->where($search_condition, $search_params);
        }

        if (!empty($request->orderby)) {
            $ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
            $db->orderBy($request->orderby, $ordertype);
        } else {
            $db->orderBy("tbl_payment_security.id", ORDER_TYPE);
        }

        if ($fieldname) {
            $db->where($fieldname, $fieldvalue);
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

        $this->view->page_title = "Payment Security Codes";
        $this->render_view("paymentsecurity/list.php", $data);
    }

    /**
     * Add a new payment security code
     */
    function add()
    {
        $db = $this->GetModel();

        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);

            $this->fields = ['booking_reference_number'];

            $this->rules_array = [
                'booking_reference_number' => 'required',
            ];

            $this->sanitize_array = [
                'booking_reference_number' => 'sanitize_string',
            ];

            $this->filter_vals = true;
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($errors)) {
                $modeldata['payment_security_code'] = $this->generate_security_code();
                $modeldata['status'] = PaymentSecurityStatus::active;
                $modeldata['created_date'] = date('Y-m-d H:i:s');
                $modeldata['modified_date'] = date('Y-m-d H:i:s');

                $rec_id = $db->insert($this->tablename, $modeldata);
                if (!$rec_id) {
                    $errors[] = $db->getLastError() ?: 'Failed to create payment security code.';
                }
            }

            ajaxFormPostOutcome($errors, get_link("paymentsecurity"));
            return;
        }

        $this->view->page_title = "New Payment Security Code";
        $this->render_view("paymentsecurity/add.php");
    }

    /**
     * Edit a payment security code (update status)
     */
    function edit($rec_id = null)
    {
        $db = $this->GetModel();
        $this->rec_id = $rec_id;
        $tablename = $this->tablename;

        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);

            $this->fields = ['booking_reference_number', 'status'];

            $this->rules_array = [
                'booking_reference_number' => 'required',
                'status' => 'required',
            ];

            $this->sanitize_array = [
                'booking_reference_number' => 'sanitize_string',
                'status' => 'sanitize_string',
            ];

            $this->filter_vals = true;
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($errors)) {
                $modeldata['modified_date'] = date('Y-m-d H:i:s');
                $db->where("id", $rec_id);
                $bool = $db->update($tablename, $modeldata);
                if (!$bool) {
                    $errors[] = $db->getLastError() ?: 'Failed to update payment security code.';
                }
            }

            ajaxFormPostOutcome($errors, get_link("paymentsecurity"));
            return;
        }

        $db->where("id", $rec_id);
        $data = $db->getOne($tablename, $this->fields);

        if (!$data) {
            $this->set_page_error(get_lang('no_record_found'));
            return $this->render_view("errors/error_404.php");
        }

        $this->view->page_title = "Edit Payment Security Code";
        $this->render_view("paymentsecurity/edit.php", $data);
    }

    /**
     * Delete a payment security code
     */
    function delete($rec_id = null)
    {
        Csrf::cross_check();
        $db = $this->GetModel();
        $this->rec_id = $rec_id;

        $arr_rec_id = array_map('trim', explode(",", $rec_id));
        $db->where("id", $arr_rec_id, "in");
        $bool = $db->delete($this->tablename);

        if ($bool) {
            $this->set_flash_msg('Code deleted successfully.', "success");
        } elseif ($db->getLastError()) {
            $this->set_flash_msg($db->getLastError(), "danger");
        }

        return $this->redirect("paymentsecurity");
    }

    /**
     * Generate the next sequential security code
     * Format: NWTS@{2-digit year}1{zero-padded id}
     * e.g. NWTS@2610001
     */
    private function generate_security_code()
    {
        $db = $this->GetModel();
        $db->orderBy("id", "DESC");
        $last = $db->getOne($this->tablename, ["id"]);

        $i = !empty($last) ? intval($last['id']) + 1 : 1;
        $len = strlen((string)$i);

        if ($len >= 4) {
            return 'NWTS@' . date('y') . '1' . $i;
        }

        $padding = str_repeat('0', 4 - $len);
        return 'NWTS@' . date('y') . '1' . $padding . $i;
    }
}
