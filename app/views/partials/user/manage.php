<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$page_id = $this->route->page_id;
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;

$url = get_link("user/manage");

if (!empty(Router::$page_id)) {
    $url .= "/" . Router::$page_id;
}

$url .= "?csrf_token=$csrf_token";
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <div class="">
        <div class="">
            <div class="row ">
                <div class="col-lg-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form enctype="multipart/form-data" action="<?= $url ?>" method="POST" class="ajax" data-feedback-div="apply-feedback">
                            <?php $this :: display_page_errors(); ?>
                            <div id="apply-feedback"></div>
                            <div>
                                <?php
                                $fields = array();

                                $fields[] = array(
                                    'name' => 'name',
                                    'type' => InputType::text,
                                    'label' => get_lang('name'),
                                    'required' => true
                                );

                                $fields[] = array(
                                    'name' => 'surname',
                                    'type' => InputType::text,
                                    'label' => get_lang('surname'),
                                    'required' => true
                                );

                                $fields[] = array(
                                    'name' => 'username',
                                    'type' => InputType::text,
                                    'label' => get_lang('username'),
                                    'required' => true
                                );

                                $fields[] = array(
                                    'name' => 'user_email',
                                    'type' => InputType::text,
                                    'label' => get_lang('email_address'),
                                    'required' => true
                                );

                                $fields[] = array(
                                    'name' => 'password',
                                    'type' => InputType::password,
                                    'label' => get_lang('password'),
                                    'required' => true
                                );

                                $fields[] = array(
                                    'name' => 'confirm_password',
                                    'type' => InputType::password,
                                    'label' => get_lang('confirm_password'),
                                    'required' => true
                                );

                                foreach ($fields as $field) {
                                    //For preloading of forms with values, pass the record with matching field names into the page_props of the view
                                    //This next line will handle autosetting the value
                                    $field['value'] = $this->set_field_value($field['name'], '');
                                    $comp_model->addInput($field);
                                }
                                ?>
                            </div>
                            <button class="btn btn-success" type="submit"><?= get_lang('submit') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>