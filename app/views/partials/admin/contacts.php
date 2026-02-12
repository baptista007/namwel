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
<section class="page" id="<?php echo $page_element_id; ?>">
    <div class="">
        <div class="">
            <div class="row ">
                <div class="col-lg-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="p-3 animated fadeIn page-content">
                        <form id="client-add-form" role="form" novalidate class="form page-form form-horizontal needs-validation" action="<?php print_link("admin/contacts?csrf_token=$csrf_token") ?>" method="post">
                            <?php
                            $comp_model->addInput([
                                'name' => 'tel',
                                'type' => InputType::text,
                                'label' => 'Telephone',
                                'required' => true,
                                'value' => $this->set_field_value('tel')
                            ]);
                            
                            $comp_model->addInput([
                                'name' => 'mobile',
                                'type' => InputType::text,
                                'label' => 'Mobile',
                                'required' => true,
                                'value' => $this->set_field_value('mobile')
                            ]);
                            
                            $comp_model->addInput([
                                'name' => 'email',
                                'type' => InputType::text,
                                'label' => 'Email',
                                'required' => false,
                                'value' => $this->set_field_value('email')
                            ]);
                            
                            $comp_model->addInput([
                                'name' => 'whatsapp',
                                'type' => InputType::text,
                                'label' => 'Whatsapp',
                                'required' => false,
                                'value' => $this->set_field_value('whatsapp')
                            ]);
                            
                            $comp_model->addInput([
                                'name' => 'facebook',
                                'type' => InputType::text,
                                'label' => 'Facebook',
                                'required' => false,
                                'value' => $this->set_field_value('facebook')
                            ]);
                            
                            $comp_model->addInput([
                                'name' => 'instagram',
                                'type' => InputType::text,
                                'label' => 'Instagram',
                                'required' => false,
                                'value' => $this->set_field_value('instagram')
                            ]);
                            
                            $comp_model->addInput([
                                'name' => 'youtube',
                                'type' => InputType::text,
                                'label' => 'YouTube',
                                'required' => false,
                                'value' => $this->set_field_value('youtube')
                            ]);
                            
                            $comp_model->addInput([
                                'name' => 'tiktok',
                                'type' => InputType::text,
                                'label' => 'TikTok',
                                'required' => false,
                                'value' => $this->set_field_value('tiktok')
                            ]);
                            ?>
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