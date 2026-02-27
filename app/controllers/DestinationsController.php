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
    }

    /**
     * Destinations landing page
     */
    function index()
    {
        $this->view->page_title = SITE_NAME . " - Destinations";
        $this->render_view("destinations/index.php", null, "index_layout.php");
    }

    function namibia()
    {
        $this->view->page_title = SITE_NAME . " - Namibia";
        $this->render_view("destinations/namibia.php", null, "index_layout.php");
    }

    function botswana()
    {
        $this->view->page_title = SITE_NAME . " - Botswana";
        $this->render_view("destinations/botswana.php", null, "index_layout.php");
    }

    function south_africa()
    {
        $this->view->page_title = SITE_NAME . " - South Africa";
        $this->render_view("destinations/south_africa.php", null, "index_layout.php");
    }

    function zambia()
    {
        $this->view->page_title = SITE_NAME . " - Zambia";
        $this->render_view("destinations/zambia.php", null, "index_layout.php");
    }

    function angola()
    {
        $this->view->page_title = SITE_NAME . " - Angola";
        $this->render_view("destinations/angola.php", null, "index_layout.php");
    }
}
