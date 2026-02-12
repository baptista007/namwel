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
                        <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("faq/manage" . (!empty($page_id) ? "/" . $page_id : "") . "?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <?php 
                                $comp_model->addInput([ 
                                    'name' => 'title',
                                    'type' => InputType::textarea,  
                                    'label' => get_lang('title'),
                                    'required' => true,
                                    'value' => $this->set_field_value('title'),
                                    'class' => 'summernote'
                                ]);
                                
                                $comp_model->addInput([
                                    'name' => 'description',
                                    'type' => InputType::textarea,
                                    'label' => 'Description',
                                    'required' => false,  
                                    'class' => 'tinymce',
                                    'value' => $this->set_field_value('description') 
                                ]);
                                ?>
                            </div> 
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <div class="form-ajax-status"></div>
                                <button class="btn btn-primary" type="submit">
                                    <?php print_lang('submit'); ?>
                                    <i class="fas fa-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>