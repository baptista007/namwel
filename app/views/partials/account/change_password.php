<section>
    <form enctype="multipart/form-data" action="<?= print_link('account/change_password?csrf_token=' . Csrf::$token) ?>" method="POST" class="ajax" data-feedback-div="apply-feedback">
        <div>
            <div id="apply-feedback"></div>
            <?php
            $comp_model = new SharedController;
            $fields[] = array(
                'name' => 'current_pwd',
                'type' => InputType::password,
                'label' => get_lang('current_pwd'),
                'required' => true
            );

            $fields[] = array(
                'name' => 'password',
                'type' => InputType::password,
                'label' => get_lang('new_password'),
                'required' => true
            );

            $fields[] = array(
                'name' => 'confirm_password',
                'type' => InputType::password,
                'label' => get_lang('confirm_new_password'),
                'required' => true
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