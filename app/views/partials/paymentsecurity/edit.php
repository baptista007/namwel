<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
$page_id = $this->route->page_id;

$status_options = [
    PaymentSecurityStatus::active   => 'Active',
    PaymentSecurityStatus::redeemed => 'Redeemed',
    PaymentSecurityStatus::expired  => 'Expired',
];
?>
<section class="page" id="<?= $page_element_id ?>" data-page-type="edit" data-page-url="<?php print_link($current_page); ?>">
    <?php $this::display_page_errors(); ?>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="animated fadeIn page-content">

                <div class="mb-3 p-3 bg-light rounded border">
                    <small class="text-muted d-block">Security Code</small>
                    <strong><code><?= htmlspecialchars($data['payment_security_code']) ?></code></strong>
                </div>

                <form id="paymentsecurity-edit-form" role="form" novalidate
                      class="form page-form form-horizontal needs-validation"
                      action="<?php print_link("paymentsecurity/edit/$page_id?csrf_token=$csrf_token") ?>"
                      method="post">

                    <?php
                    $comp_model->addInput([
                        'name'     => 'booking_reference_number',
                        'type'     => InputType::text,
                        'label'    => 'Booking Reference Number',
                        'required' => true,
                        'value'    => $this->set_field_value('booking_reference_number', $data['booking_reference_number']),
                    ]);
                    ?>

                    <div class="form-group mb-3">
                        <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control" required>
                            <?php foreach ($status_options as $val => $label): ?>
                            <option value="<?= $val ?>" <?= intval($data['status']) === $val ? 'selected' : '' ?>>
                                <?= $label ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group form-submit-btn-holder text-center mt-4">
                        <div class="form-ajax-status"></div>
                        <a class="btn btn-secondary me-2" href="<?php print_link("paymentsecurity") ?>">
                            <i class="fa fa-arrow-left"></i> Cancel
                        </a>
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-save"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
