<?php
/**
 * Destinations Controller (Public Website)
 * @category Controller
 */
class DestinationsController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->view->show_page_tile = false;
    }

    /**
     * Destinations landing page
     */
    function index()
    {
        $this->view->page_title = "Destinations";
        $this->render_view("destinations/index.php", null, "index_layout.php");
    }

    function namibia()
    {
        $this->view->page_title = "Namibia";
        $this->render_view("destinations/namibia.php", null, "index_layout.php");
    }

    function botswana()
    {
        $this->view->page_title = "Botswana";
        $this->render_view("destinations/botswana.php", null, "index_layout.php");
    }

    function south_africa()
    {
        $this->view->page_title = "South Africa";
        $this->render_view("destinations/south_africa.php", null, "index_layout.php");
    }

    function zambia()
    {
        $this->view->page_title = "Zambia";
        $this->render_view("destinations/zambia.php", null, "index_layout.php");
    }

    function angola()
    {
        $this->view->page_title = "Angola";
        $this->render_view("destinations/angola.php", null, "index_layout.php");
    }

    function zimbabwe()
    {
        $this->view->page_title = "Zimbabwe";
        $this->render_view("destinations/zimbabwe.php", null, "index_layout.php");
    }
}
