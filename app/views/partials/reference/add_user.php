<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
$data = $this->view_data;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <div class="">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="p-3 animated fadeIn page-content">
                        <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("institutions/add_user/" . $data['id'] . "?csrf_token=$csrf_token") ?>" method="post" data-feedback-div="feedback">
                            <div id="feedback"></div>
                            <div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'name',
                                            'type' => InputType::text,
                                            'label' => 'Entity Name',
                                            'required' => true
                                        ]);
                                        ?>
                                    </div>
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'surname',
                                            'type' => InputType::text,
                                            'label' => 'Surname',
                                            'required' => true
                                        ]);

                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'username',
                                            'type' => InputType::text,
                                            'label' => 'Username',
                                            'required' => true
                                        ]);

                                        ?>
                                    </div>
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'user_email',
                                            'type' => InputType::text,
                                            'label' => 'User Email',
                                            'required' => true
                                        ]);

                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'password',
                                            'type' => InputType::password,
                                            'label' => 'Password',
                                            'required' => true
                                        ]);

                                        ?>
                                    </div>
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'conf_password',
                                            'type' => InputType::password,
                                            'label' => 'Confirm Password',
                                            'required' => true
                                        ]);

                                        ?>
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