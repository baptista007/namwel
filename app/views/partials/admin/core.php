<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$page_id = $this->route->page_id;
$csrf_token = Csrf::$token;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <div class="">
        <?php $this::display_page_errors(); ?>
        <div class="bg-light p-3 animated fadeIn page-content">
            <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("admin/core?csrf_token=$csrf_token") ?>" method="post">
                <fieldset>
                    <legend>
                        <?= get_lang('about_us') ?>
                    </legend>
                    <div>
                        <textarea name="about_us" id="about_us" class="form-control summernote">
                            <?= $this->set_field_value('about_us') ?>
                        </textarea>
                    </div>
                </fieldset>
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
</section>