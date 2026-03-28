<?php

/**
 * Quote Request Controller (Admin)
 * Manages quote requests submitted from the public website
 * @category Controller
 */
class QuoteController extends SecureController
{
    function __construct()
    {
        parent::__construct();
        $this->tablename = SqlTables::tbl_quote;

        $this->fields = [
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'country',
            'destinations',
            'trip_type',
            'accommodation',
            'travelers',
            'start_date',
            'end_date',
            'date_flexibility',
            'budget',
            'interests',
            'message',
            'referral',
            'status',
            'created_date',
        ];
    }

    /**
     * List all quote requests
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
                tbl_quote.first_name LIKE ? OR
                tbl_quote.last_name  LIKE ? OR
                tbl_quote.email      LIKE ? OR
                tbl_quote.destinations LIKE ?
            )";
            $db->where($search_condition, ["%$text%", "%$text%", "%$text%", "%$text%"]);
        }

        if (!empty($request->status)) {
            $db->where("tbl_quote.status", $request->status);
        }

        if (!empty($request->orderby)) {
            $ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
            $db->orderBy($request->orderby, $ordertype);
        } else {
            $db->orderBy("tbl_quote.id", "DESC");
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

        $this->view->page_title = "Quote Requests";
        $this->render_view("quote/list.php", $data);
    }

    /**
     * View a single quote request
     */
    function view($rec_id = null)
    {
        $db = $this->GetModel();
        $this->rec_id = $rec_id;

        $db->where("id", $rec_id);
        $record = $db->getOne($this->tablename, $this->fields);

        if (!$record) {
            $this->set_page_error(get_lang('no_record_found'));
            return $this->render_view("errors/error_404.php");
        }

        // Mark as read if still new
        if ($record['status'] === 'new') {
            $db->where("id", $rec_id);
            $db->update($this->tablename, ['status' => 'read']);
            $record['status'] = 'read';
        }

        $this->view->page_title = "Quote — " . $record['first_name'] . " " . $record['last_name'];
        $this->render_view("quote/view.php", $record);
    }

    /**
     * Update the status of a quote request
     */
    function setstatus($rec_id = null)
    {
        Csrf::cross_check();
        $db = $this->GetModel();
        $status = trim($_GET['s'] ?? '');
        $allowed = ['new', 'read', 'replied', 'closed'];

        if ($rec_id && in_array($status, $allowed)) {
            $db->where("id", $rec_id);
            $db->update($this->tablename, ['status' => $status]);
        }

        return $this->redirect("quote/view/$rec_id");
    }

    /**
     * Delete a quote request
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
            $this->set_flash_msg('Quote request deleted.', "success");
        } elseif ($db->getLastError()) {
            $this->set_flash_msg($db->getLastError(), "danger");
        }

        return $this->redirect("quote");
    }
}
