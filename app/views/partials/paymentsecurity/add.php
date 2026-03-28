<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
?>
<section class="page" id="<?= $page_element_id ?>" data-page-type="add" data-page-url="<?php print_link($current_page); ?>">
    <?php $this::display_page_errors(); ?>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="animated fadeIn page-content">
                <p class="text-muted mb-3">Enter a booking reference number to generate a new payment security code.</p>
                <form id="paymentsecurity-add-form" role="form" novalidate
                      class="form page-form form-horizontal needs-validation"
                      action="<?php print_link("paymentsecurity/add?csrf_token=$csrf_token") ?>"
                      method="post">

                    <?php
                    $comp_model->addInput([
                        'name'     => 'booking_reference_number',
                        'type'     => InputType::text,
                        'label'    => 'Booking Reference Number',
                        'required' => true,
                        'value'    => $this->set_field_value('booking_reference_number'),
                    ]);
                    ?>

                    <div class="form-group form-submit-btn-holder text-center mt-4">
                        <div class="form-ajax-status"></div>
                        <a class="btn btn-secondary me-2" href="<?php print_link("paymentsecurity") ?>">
                            <i class="fa fa-arrow-left"></i> Cancel
                        </a>
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-key"></i> Generate Code
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
