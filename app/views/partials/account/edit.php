<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;

//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section>
    <?php $this::display_page_errors(); ?>
    <form novalidate role="form" enctype="multipart/form-data"  class="ajax form-horizontal needs-validation" action="<?php print_link("account/edit?csrf_token=$csrf_token"); ?>" method="post" data-feedback-div="edit-account-feedback">
        <div>
            <div id="edit-account-feedback"></div>
            <?php
            $fields = array();
            $fields[] = array(
                'name' => 'name',
                'type' => InputType::text,
                'label' => get_lang('name'),
                'required' => true,
                'value' => $data['name']
            );

            $fields[] = array(
                'name' => 'surname',
                'type' => InputType::text,
                'label' => get_lang('surname'),
                'required' => true,
                'value' => $data['surname']
            );

            $fields[] = array(
                'name' => 'user_email',
                'type' => InputType::text,
                'label' => get_lang('email_address'),
                'required' => true,
                'value' => $data['user_email']
            );

            $fields[] = array(
                'name' => 'username',
                'type' => InputType::text,
                'label' => get_lang('username'),
                'required' => true,
                'value' => $data['username']
            );

            foreach ($fields as $field) {
                $comp_model->addInput($field);
            }
            ?>
        </div>
        <button class="btn btn-primary" type="submit">
            <?= get_lang('update_account') ?>
        </button>
    </form>
</section>
