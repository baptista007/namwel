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
<form class="form form-horizontal ajax" action="<?php print_link("gallery/new?csrf_token=" . Csrf::$token) ?>" method="post" data-feedback-div="subscribe-feedback">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= get_lang('new_gallery_item') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="subscribe-feedback"></div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">
                        <?= get_lang('image') ?> <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image"><?= get_lang('choose_file') ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?= print_lang('standard_save') ?></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= print_lang('standard_close') ?></button>
            </div>
        </div>
    </div>
</form>