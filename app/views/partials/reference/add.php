<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
    ?>
        <div class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div class="col ">
                        <h4 class="record-title">
                            Add new public entity
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("institutions/add?csrf_token=$csrf_token") ?>" method="post">
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
                                            'name' => 'short_name',
                                            'type' => InputType::text,
                                            'label' => 'Short Name',
                                            'required' => true
                                        ]);

                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'physical_address',
                                            'type' => InputType::textarea,
                                            'label' => 'Physical address',
                                            'required' => true
                                        ]);

                                        ?>
                                    </div>
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'telephone',
                                            'type' => InputType::text,
                                            'label' => 'Contact Telephone Number',
                                            'required' => true
                                        ]);

                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-xs-12">
                                        <?php
                                        $comp_model->addInput([
                                            'name' => 'email',
                                            'type' => InputType::text,
                                            'label' => 'Contact Email address',
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