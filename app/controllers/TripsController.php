<?php

/**
 * Guaranteed Trips Public Controller
 * @category Controller
 */
class TripsController extends BaseController {

    function __construct() {
        parent::__construct();
        $this->view->show_page_tile = false;
    }

    function index() {
        $db = $this->GetModel();
        $db->where("status", 1);
        $db->orderBy("departure_date", "ASC");
        $trips = $db->get(SqlTables::tbl_guaranteed_trip, null, [
            "id", "title", "subtitle", "destination", "departure_date",
            "end_date", "duration", "price", "price_currency", "price_label",
            "spots_available", "spots_left", "description", "highlights",
            "includes_text", "cover_image", "badge"
        ]);

        $data = new stdClass;
        $data->trips = $trips ?: [];

        $this->view->page_title = get_lang('gtrip_page_title');
        $this->render_view("trips/index.php", $data, "index_layout.php");
    }

}
