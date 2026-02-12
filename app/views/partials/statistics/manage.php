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
                        <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("statistics/index?csrf_token=$csrf_token") ?>" method="post">
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <?= get_lang('happy_clients') ?>
                                        </label>
                                        <div>
                                            <?php
                                            echo $comp_model->getInput(
                                                    'clients',
                                                    InputType::number,
                                                    $this->set_field_value('clients'),
                                                    'form-control'
                                            );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <?= get_lang('projects') ?>
                                        </label>
                                        <div>
                                            <?php
                                            echo $comp_model->getInput(
                                                'projects',
                                                InputType::number,
                                                $this->set_field_value('projects'),
                                                'form-control'
                                            );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <?= get_lang('support_hours') ?>
                                        </label>
                                        <div>
                                            <?php
                                            echo $comp_model->getInput(
                                                'support_hours',
                                                InputType::number,
                                                $this->set_field_value('support_hours'),
                                                'form-control'
                                            );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <?= get_lang('hard_workers') ?>
                                        </label>
                                        <div>
                                            <?php
                                            echo $comp_model->getInput(
                                                'staff',
                                                InputType::number,
                                                $this->set_field_value('staff'),
                                                'form-control'
                                            );
                                            ?>
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