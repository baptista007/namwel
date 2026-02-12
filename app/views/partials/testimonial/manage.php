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
                        <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("testimonial/manage" . (!empty($page_id) ? "/" . $page_id : "") . "?csrf_token=$csrf_token") ?>" method="post">
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
                                    'name' => 'message',
                                    'type' => InputType::textarea,
                                    'label' => get_lang('message'),
                                    'required' => false,
                                    'class' => 'tinymce',
                                    'value' => $this->set_field_value('message')
                                ]);
                                ?>
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