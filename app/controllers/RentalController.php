<?php

/**
 * RentalController — Public Car Rental Listing Page
 * URL: /rental  or  /rental/index
 */
class RentalController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    /**
     * Public listing of available rental vehicles.
     * Supports optional query-string filters:
     *   ?body_type=2  (CarBodyType constant)
     *   ?transmission=automatic
     *   ?max_price=150
     */
    function index() {
        $request = $this->request;
        $db      = $this->GetModel();

        // Only show active vehicles on the public page
        $db->where("status", Status::active);

        // Optional filters from query string
        if (!empty($request->body_type) && is_numeric($request->body_type)) {
            $db->where("body_type", intval($request->body_type));
        }

        if (!empty($request->transmission) && in_array($request->transmission, ['automatic', 'manual'])) {
            $db->where("transmission", $request->transmission);
        }

        if (!empty($request->max_price) && is_numeric($request->max_price)) {
            $db->where("price_per_day", floatval($request->max_price), "<=");
        }

        $db->orderBy("price_per_day", "ASC");

        $vehicles = $db->get(SqlTables::tbl_vehicle, null, [
            "id", "make", "model", "year", "body_type", "seats",
            "transmission", "fuel_type", "price_per_day", "mileage",
            "description", "features", "cover_image", "status"
        ]);

        $data           = new stdClass;
        $data->vehicles = $vehicles ?: [];
        $data->filters  = [
            'body_type'    => $request->body_type    ?? '',
            'transmission' => $request->transmission ?? '',
            'max_price'    => $request->max_price    ?? '',
        ];

        $this->view->page_title = get_lang('rental_page_title');
        $this->render_view("rental/index.php", $data, "index_layout.php");
    }
}
