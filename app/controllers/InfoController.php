<?php

/**
 * Info Contoller Class
 * @category  Controller
 */

class InfoController extends BaseController
{

	/**
	 * Display Privacy Policy Page
	 * @return Html View
	 */
	function privacy()
	{
		$this->view->page_title = "Privacy Policy";
		$this->render_view("info/privacy.php", null, "index_layout.php");
	}

	/**
	 * Display Terms And Conditions Page
	 * @return Html View
	 */
	function terms()
	{
		$this->view->page_title = "Terms and Conditions";
		$this->render_view("info/terms.php", null, "index_layout.php");
	}

	function change_language($lang = null)
	{
		if (!empty($lang)) {
			set_cookie('lang', $lang);
			redirect_to_page(DEFAULT_PAGE);
		} else {
			$this->render_view("info/change_language.php", null, "info_layout.php");
		}
	}
}
