<?php

/**
 * Index Page Controller
 * @category  Controller
 */
class IndexController extends BaseController {

    function __construct() {
        parent::__construct();
        $this->tablename = "tbl_user";
    }

    /**
     * Index Action 
     * @return null
     */
    function index() {
        $this->view->page_title = SITE_NAME . ' - Welcome';
        $this->render_view("index/index.php", null, "welcome_layout.php");
    }
    
    function about() {
        $this->view->page_title = SITE_NAME . " - About";
        $this->render_view("index/about.php", null, "welcome_layout.php");
    }

    function news() {
        $db = $this->GetModel();
        $pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
        $tc = $db->withTotalCount();
        $records = $db->get(SqlTables::tbl_news, $pagination);
        $records_count = count($records);
        $total_records = intval($tc->totalCount);
        $page_limit = $pagination[1];
        $total_pages = ceil($total_records / $page_limit);
        $data = new stdClass;
        $data->records = $records;
        $data->record_count = $records_count;
        $data->total_records = $total_records;
        $data->total_page = $total_pages;
        if ($db->getLastError()) {
            $this->set_page_error();
        }
        $this->view->page_title = get_lang('news_title');
        $this->render_view("index/news.php", $data, "welcome_layout.php");
    }

    function contact() {
        if (is_post_request()) {
            try {
                $errors = [];
                $postdata = $this->format_request_data($_POST);
                
                $this->fields = [
                    'name',
                    'email',
                    'message',
                    'human_verification'
                ];

                $this->rules_array = array(
                    'name' => 'required',
                    'email' => 'required',
                    'message' => 'required',
                    'human_verification' => 'required',
                );
                
                $this->sanitize_array = array(
                    'name' => 'sanitize_string',
                    'email' => 'sanitize_string',
                    'message' => 'sanitize_string',
                    'human_verification' => 'sanitize_string',
                );

                $this->filter_vals = true; //set whether to remove empty fields
                $modeldata = $this->modeldata = $this->validate_form($postdata);

                if (!empty($this->view->page_error)) {
                    $errors = $this->view->page_error;
                }

                $first = $_POST['rand_one'];
                $second = $_POST['rand_two'];
                $answer = $_POST['human_verification'];

                if (empty($answer) || (intval($first) + intval($second) != intval($answer))) {
                    $errors[] = get_lang('human_verification_failed');
                }

                if (empty($errors)) {
                    $email_message = "Olá administrador do site, \n\n";
                    $email_message .= "A seguinte mensagem foi recebida do site:\n\n";
                    $email_message .= get_lang('name') . ": {$modeldata['name']}\n";
                    $email_message .= get_lang('email_address') . ": {$modeldata['email']}\n";
                    $email_message .= get_lang('contact_need') . ": {$modeldata['contact_need']}\n";
                    $email_message .= get_lang('message') . ": {$modeldata['message']}\n\n\n";
                    $email_message .= "Website Mailer";

                    // create email headers
                    $headers = 'From: website@chivembe.com' . "\r\n"
                            . 'X-Mailer: PHP/' . phpversion();
                    mail(DEFAULT_EMAIL, 'Contacto - Website', $email_message, $headers);
                }

                if (!empty($errors)) {
                    $msg = 'Os seguintes erros foram encontrados';
                    $msg .= '<ul class="">';

                    foreach ($errors as $x) {
                        $msg .= $x;
                    }

                    $msg .= '</ul>';
                } else {
                    $msg = 'Mensagem enviada com sucesso. Um consultor entrará em contato consigo o mais rápido possível.';
                }
            } catch (Exception $ex) {
                $errors[] = $ex->getMessage();
            }

            echo json_encode(
                    array(
                        'success' => empty($errors),
                        'message' => $msg
                    )
            );

            return;
        }
        
        $db = $this->GetModel();
        $data = $db->getOne(SqlTables::tbl_core);
        $contacts = json_decode($data['contacts'], true);

        $this->view->page_title = get_lang('contact_title');
        $this->render_view("index/contact.php", $contacts, "welcome_layout.php");
    }

    function gallery() {
        $db = $this->GetModel();
        $pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
        $tc = $db->withTotalCount();
        $records = $db->get(SqlTables::tbl_gallery_item, $pagination);
        $records_count = count($records);
        $total_records = intval($tc->totalCount);
        $page_limit = $pagination[1];
        $total_pages = ceil($total_records / $page_limit);
        $data = new stdClass;
        $data->records = $records;
        $data->record_count = $records_count;
        $data->total_records = $total_records;
        $data->total_page = $total_pages;
        if ($db->getLastError()) {
            $this->set_page_error();
        }
        $this->view->page_title = get_lang('gallery_title');
        $this->render_view("index/gallery.php", $data, "welcome_layout.php"); //render the full page
    }

    function news_item($rec_id) {
        $db = $this->GetModel();

        $db->where("id", $rec_id);
        $record = $db->getOne(SqlTables::tbl_news);

        $db->where("news_id", $rec_id);
        $files = $db->get(SqlTables::tbl_news_file);

        if ($record) {
            $record['files'] = $files;

            $db->where("id", $rec_id, "!=");
            $other_records = $db->get(SqlTables::tbl_news);
            $record['other_records'] = $other_records;

            $this->view->page_title = $record['title'];
            $this->render_view("index/news_item.php", $record, "welcome_layout.php");
        } else {
            $this->render_view(RECORD_NOT_FOUND_PAGE, null, "welcome_layout.php");
        }
    }

    function service_item($rec_id) {
        $db = $this->GetModel();

        $db->where("id", $rec_id);
        $record = $db->getOne(SqlTables::tbl_service);

        $db->where("service_id", $rec_id);
        $files = $db->get(SqlTables::tbl_service_file);

        if ($record) {
            $record['files'] = $files;

            $db->where("id", $rec_id, "!=");
            $other_records = $db->get(SqlTables::tbl_service);
            $record['other_records'] = $other_records;

            $this->render_view("index/service_item.php", $record, "welcome_layout.php");
        } else {
            $this->render_view(RECORD_NOT_FOUND_PAGE, null, "welcome_layout.php");
        }
    }
    
    function subscribe() {
        
        $this->render_view("index/subscribe.php", null, "welcome_layout.php");
    }

    function quote() {
        
        $this->render_view("index/quote.php", null, "welcome_layout.php");
    }
}
