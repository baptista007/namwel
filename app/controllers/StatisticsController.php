<?php

/**
 * Eproc_contractors Page Controller
 * @category  Controller
 */
class StatisticsController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_statistics;
        $this->fields = [
            "id",
            "clients",
            "projects",
            "support_hours",
            "staff",
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
    function index() {
//        Csrf::cross_check();
        $request = $this->request;
        $db = $this->GetModel();
        $db->where("id", 1);
        $record = $db->getOne(SqlTables::tbl_statistics);

        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);
            $this->rules_array = [];
            $this->sanitize_array = array(
                'clients' => 'sanitize_string',
                'projects' => 'sanitize_string',
                'support_hours' => 'sanitize_string',
                'staff' => 'sanitize_string',
            );

            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($errors)) {
                $db->where("id", 1);
                if (!$db->update($this->tablename, $modeldata)) {
                    $errors = get_lang('error_updating_record'); //update failed
                }
            }

            ajaxFormPostOutcome($errors, get_link("statistics"));
            return;
        }

        $this->view->page_props = $record;
        $this->view->page_title = get_lang('statistics_title');
        $this->render_view("statistics/manage.php"); //render the full page
    }

}
