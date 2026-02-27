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
}
