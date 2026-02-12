<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
        ?>
        <div  class="bg-light p-3 mb-3">
            <div class="">
                <div class="row ">
                    <div class="col-sm-3 ">
                        <button  class="btn btn btn-primary my-1" data-toggle="modal" data-target="#new-gallery-modal">
                            <i class="fa fa-plus"></i>                              
                            <?= get_lang('new_gallery_item') ?>
                        </button>
                        <button  class="btn btn btn-primary my-1" data-toggle="modal" data-target="#new-video-link-modal">
                            <i class="fa fa-plus"></i>                              
                            <?= get_lang('new_video') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div  class="">
        <div class="">
            <?php $this :: display_page_errors(); ?>
            <div  class="animated fadeIn page-content">
                <?php
                if (!empty($records)) {
                    echo '<div class="row">';
                    
                    foreach ($records as $value) {
                        ?>
                        <div class="card col-lg-2 mr-1">
                            <?php
                                if ($value['type'] == MediaType::image) {
                            ?>
                            <div class="card-body">
                                <a href="<?= get_link(UPLOAD_FILE_DIR . $value['path']) ?>" data-lightbox="<?= $value['path'] ?>">
                                    <img src="<?php print_link(UPLOAD_FILE_DIR . $value['path']) ?>" style="width: 100%" />
                                </a>
                                <p class="card-text">
                                    <?= $value['alt'] ?>
                                </p>
                            </div>
                            <?php
                                } else {
                                    echo $value['path'];
                                }
                            ?>
                            <div class="card-footer">
                                <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="<?php print_lang('delete_this_record'); ?>" href="<?php print_link("gallery/delete/{$value['id']}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="<?= get_lang('delete_confirmation') ?>" data-display-style="modal">
                                    <i class="fa fa-times"></i>
                                    <?php print_lang('delete'); ?>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    
                    echo '</div>';
                    
                } else {
                    ?>
                    <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                        <i class="fa fa-ban"></i> <?php print_lang('no_record_found'); ?>
                    </h4>
                    <?php
                }
                ?>
            </div>
            <?php
            if ($show_footer && !empty($records)) {
                ?>
                <div class=" border-top mt-2">
                    <div class="row justify-content-center">    
                        <div class="col">   
                            <?php
                            if ($show_pagination == true) {
                                $pager = new Pagination($total_records, $record_count);
                                $pager->route = $this->route;
                                $pager->show_page_count = true;
                                $pager->show_record_count = true;
                                $pager->show_page_limit = true;
                                $pager->limit_count = $this->limit_count;
                                $pager->show_page_number_list = true;
                                $pager->pager_link_range = 5;
                                $pager->render();
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<div class="modal fade" id="new-gallery-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form form-horizontal ajax" action="<?php print_link("gallery/new_gallery?csrf_token=" . Csrf::$token) ?>" method="post" data-feedback-div="upload-feedback">
                <div class="modal-header">
                    <h5 class="modal-title"><?= get_lang('new_gallery_item') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="upload-feedback"></div>
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
                    <?php
                    $comp_model->addInput([
                        'name' => 'alt',
                        'type' => InputType::text,
                        'label' => get_lang('alt'),
                        'required' => false
                    ]);
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?= print_lang('submit') ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= print_lang('close') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="new-video-link-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form form-horizontal ajax" action="<?php print_link("gallery/new_link?csrf_token=" . Csrf::$token) ?>" method="post" data-feedback-div="new-link-feedback">
                <div class="modal-header">
                    <h5 class="modal-title"><?= get_lang('new_video') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="new-link-feedback"></div>
                    <?php
                    $comp_model->addInput([
                        'name' => 'link',
                        'type' => InputType::textarea,
                        'label' => get_lang('link'),
                        'required' => true
                    ]);
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?= print_lang('submit') ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= print_lang('close') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
