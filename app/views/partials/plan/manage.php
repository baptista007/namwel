<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$page_id = $this->route->page_id;
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <div class="">
        <div class="">
            <div class="row ">
                <div class="col-lg-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("plan/manage" . (!empty($page_id) ? "/" . $page_id : "") . "?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <?php
                                $comp_model->addInput([
                                    'name' => 'name',
                                    'type' => InputType::text,
                                    'label' => get_lang('name'),
                                    'required' => true,
                                    'value' => $this->set_field_value('name')
                                ]);

                                $comp_model->addInput([
                                    'name' => 'speed',
                                    'type' => InputType::text,
                                    'label' => get_lang('speed'),
                                    'required' => true,
                                    'value' => $this->set_field_value('speed')
                                ]);

                                $comp_model->addInput([
                                    'name' => 'monthly',
                                    'type' => InputType::number,
                                    'label' => get_lang('monthly_price'),
                                    'required' => true,
                                    'value' => $this->set_field_value('monthly')
                                ]);

                                $comp_model->addInput([
                                    'name' => 'trimestral',
                                    'type' => InputType::number,
                                    'label' => get_lang('trimestral_price'),
                                    'required' => true,
                                    'value' => $this->set_field_value('trimestral')
                                ]);

                                $comp_model->addInput([
                                    'name' => 'description',
                                    'type' => InputType::textarea,
                                    'label' => get_lang('plan_description'),
                                    'required' => false,
                                    'class' => 'tinymce',
                                    'value' => $this->set_field_value('description')
                                ]);
                                ?>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?= get_lang('file_photos') ?></label>
                                    <div class="col-sm-8">
                                        <?php
                                        if (!empty($this->page_props['files'])) {
                                            echo '<ul class="list-group mb-2">';

                                            foreach ($this->page_props['files'] as $file) {
                                                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                                                echo '<a href="' . get_link(UPLOAD_FILE_DIR . $file['path']) . '" target="_blank">';
                                                echo $file['original_name'];
                                                echo '</a>';
                                                echo '<span class="badge badge-danger badge-pill">';
                                                echo '<a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="' . get_lang('delete_this_record') . '" href="' . get_link("plan/delete_plan_file/{$file['id']}/?csrf_token=$csrf_token&redirect=$current_page") . '" data-prompt-msg="' . get_lang('delete_confirmation') . '" data-display-style="modal">
                                                            <i class="fa fa-times"></i>' . get_lang('delete') . '
                                                        </a>';
                                                echo '</span>';
                                                echo '</li>';
                                            }

                                            echo '</ul>';
                                        }
                                        ?>
                                        <div class="field_wrapper">
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="files[]" id="additional-photo-1">
                                                    <label class="custom-file-label" for="additional-photo-1"><?= get_lang('choose_file') ?></label>
                                                </div>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary add_button" type="button"><?= get_lang('add_new_file') ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <div class="form-ajax-status"></div>
                                <button class="btn btn-primary" type="submit">
                                    <?php print_lang('submit'); ?>
                                    <i class="fa fa-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="input-group mb-3">' +
                '<div class="custom-file">' +
                '<input type="file" class="custom-file-input" name="files[]">' +
                '<label class="custom-file-label"><?= get_lang('choose_file') ?></label>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-danger remove_button" type="button"><?= get_lang('delete') ?></button>' +
                '</div>' +
                '</div>';

        $(addButton).click(function () {
            $(wrapper).append(fieldHTML);
        });

        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            console.log('Clicked!');
            $(this).closest('.input-group').remove();
        });
    });
</script>