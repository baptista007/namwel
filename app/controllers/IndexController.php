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
        $this->view->page_title = 'Welcome';
        $this->render_view("index/index.php", null, "welcome_layout.php");
    }
    
    function about() {
        $this->view->page_title = "About " . SITE_NAME;
        $this->render_view("index/about.php", null, "index_layout.php");
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
        $this->render_view("index/contact.php", $contacts, "index_layout.php");
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
        $this->render_view("index/gallery.php", $data, "index_layout.php"); //render the full page
    }

    
    function subscribe() {
        
        $this->render_view("index/subscribe.php", null, "index_layout.php");
    }

    function quote() {
        if (is_post_request()) {
            try {
                $errors = [];
                $p = $_POST;

                $firstName = trim($p['firstName'] ?? '');
                $lastName  = trim($p['lastName']  ?? '');
                $email     = trim($p['email']     ?? '');
                $travelers = trim($p['travelers'] ?? '');

                if (empty($firstName)) $errors[] = 'First name is required.';
                if (empty($lastName))  $errors[] = 'Last name is required.';
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email address is required.';
                if (empty($travelers)) $errors[] = 'Number of travelers is required.';

                $phone         = trim($p['phone']           ?? '');
                $country       = trim($p['country']         ?? '');
                $tripType      = trim($p['tripType']        ?? '');
                $accommodation = trim($p['accommodation']   ?? '');
                $startDate     = trim($p['startDate']       ?? '');
                $endDate       = trim($p['endDate']         ?? '');
                $flexibility   = trim($p['dateFlexibility'] ?? '');
                $budget        = trim($p['budget']          ?? '');
                $message       = trim($p['message']         ?? '');
                $referral      = trim($p['referral']        ?? '');

                $destinations = isset($p['destination']) && is_array($p['destination'])
                    ? implode(', ', array_map('trim', $p['destination']))
                    : trim($p['destination'] ?? '');

                $interests = isset($p['interest']) && is_array($p['interest'])
                    ? implode(', ', array_map('trim', $p['interest']))
                    : '';

                if (empty($errors)) {
                    // Persist to database
                    $db = $this->GetModel();
                    $db->insert(SqlTables::tbl_quote, [
                        'first_name'     => $firstName,
                        'last_name'      => $lastName,
                        'email'          => $email,
                        'phone'          => $phone,
                        'country'        => $country,
                        'destinations'   => $destinations,
                        'trip_type'      => $tripType,
                        'accommodation'  => $accommodation,
                        'travelers'      => $travelers,
                        'start_date'     => $startDate ?: null,
                        'end_date'       => $endDate ?: null,
                        'date_flexibility' => $flexibility,
                        'budget'         => $budget,
                        'interests'      => $interests,
                        'message'        => $message,
                        'referral'       => $referral,
                        'status'         => 'new',
                        'created_date'   => date('Y-m-d H:i:s'),
                    ]);

                    $body  = "New quote request received from the Namwel website.\n\n";
                    $body .= "--- CONTACT ---\n";
                    $body .= "Name:    {$firstName} {$lastName}\n";
                    $body .= "Email:   {$email}\n";
                    if ($phone)    $body .= "Phone:   {$phone}\n";
                    if ($country)  $body .= "Country: {$country}\n";
                    if ($referral) $body .= "Referral: {$referral}\n";
                    $body .= "\n--- TRIP DETAILS ---\n";
                    if ($destinations)  $body .= "Destinations: {$destinations}\n";
                    if ($tripType)      $body .= "Trip type:    {$tripType}\n";
                    if ($accommodation) $body .= "Accommodation: {$accommodation}\n";
                    $body .= "Travelers:    {$travelers}\n";
                    $body .= "\n--- DATES & BUDGET ---\n";
                    if ($startDate)   $body .= "Start date:  {$startDate}\n";
                    if ($endDate)     $body .= "End date:    {$endDate}\n";
                    if ($flexibility) $body .= "Flexibility: {$flexibility}\n";
                    if ($budget)      $body .= "Budget (pp): {$budget}\n";
                    if ($interests)   $body .= "Interests:   {$interests}\n";
                    if ($message)     $body .= "\n--- ADDITIONAL NOTES ---\n{$message}\n";

                    $headers = 'From: website@namwel.com' . "\r\n"
                             . 'Reply-To: ' . $email . "\r\n"
                             . 'X-Mailer: PHP/' . phpversion();
                    mail(DEFAULT_EMAIL, 'New Quote Request - ' . $firstName . ' ' . $lastName, $body, $headers);

                    $autoReply  = "Dear {$firstName},\n\n";
                    $autoReply .= "Thank you for your interest in Namwel Tours & Car Rentals!\n\n";
                    $autoReply .= "We have received your quote request and our team will send you a personalised itinerary within 24 hours.\n\n";
                    $autoReply .= "Warm regards,\nThe Namwel Team\n";
                    $arHeaders = 'From: ' . DEFAULT_EMAIL . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    mail($email, 'Your Quote Request - Namwel Tours', $autoReply, $arHeaders);
                }

                $msg = empty($errors)
                    ? 'Your quote request has been received. We will be in touch within 24 hours!'
                    : implode(' ', $errors);

                echo json_encode(['success' => empty($errors), 'message' => $msg]);

            } catch (Exception $ex) {
                echo json_encode(['success' => false, 'message' => $ex->getMessage()]);
            }
            return;
        }

        $this->view->page_title = "Request a Quote";
        $this->render_view("index/quote.php", null, "index_layout.php");
    }
}
