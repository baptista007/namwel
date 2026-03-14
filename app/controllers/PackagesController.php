<?php
/**
 * Packages Controller (Public Website)
 * @category Controller
 */
class PackagesController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->view->show_page_tile = false;
    }

    function index()
    {
        $this->view->page_title = "Tour Packages";
        $this->render_view("packages/index.php", null, "index_layout.php");
    }

    function special_offers()
    {
        $this->view->page_title = "Special Offers";
        $this->render_view("packages/special_offers.php", null, "index_layout.php");
    }

    function honeymoon()
    {
        $this->view->page_title = "Honeymoon";
        $this->render_view("packages/honeymoon.php", null, "index_layout.php");
    }

    function camping()
    {
        $this->view->page_title = "Camping & Overland";
        $this->render_view("packages/camping.php", null, "index_layout.php");
    }

    // ── Tour Detail Pages ────────────────────────────────────────────

    function treasure_southern_africa()
    {
        $data = Tours::treasure_southern_africa();
        $this->view->page_title = $data['title'];
        $this->render_view("tours/tour_detail.php", $data, "index_layout.php");
    }

    function great_south_namibia()
    {
        $data = Tours::great_south_namibia();
        $this->view->page_title = $data['title'];
        $this->render_view("tours/tour_detail.php", $data, "index_layout.php");
    }

    function great_spaces_namibia()
    {
        $data = Tours::great_spaces_namibia();
        $this->view->page_title = $data['title'];
        $this->render_view("tours/tour_detail.php", $data, "index_layout.php");
    }

    function fascinating_southern_africa()
    {
        $data = Tours::fascinating_southern_africa();
        $this->view->page_title = $data['title'];
        $this->render_view("tours/tour_detail.php", $data, "index_layout.php");
    }

    function southern_africa_escape()
    {
        $data = Tours::southern_africa_escape();
        $this->view->page_title = $data['title'];
        $this->render_view("tours/tour_detail.php", $data, "index_layout.php");
    }

    function unforgettable_adventure()
    {
        $data = Tours::unforgettable_adventure();
        $this->view->page_title = $data['title'];
        $this->render_view("tours/tour_detail.php", $data, "index_layout.php");
    }
}
