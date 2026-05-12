<?php
$comp_model     = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page   = $this->set_current_page_link();
$page_id        = $this->route->page_id;
$csrf_token     = Csrf::$token;
$is_edit        = !empty($page_id);

// Body type options
$body_type_options = [
    ['value' => CarBodyType::sedan,        'label' => get_lang('fleet_body_sedan')],
    ['value' => CarBodyType::suv,          'label' => get_lang('fleet_body_suv')],
    ['value' => CarBodyType::pickup_truck, 'label' => get_lang('fleet_body_pickup')],
];

// Status options
$status_options = [
    ['value' => Status::active,   'label' => get_lang('fleet_status_active')],
    ['value' => Status::inactive, 'label' => get_lang('fleet_status_inactive')],
];

// Transmission options
$transmission_options = [
    ['value' => 'automatic', 'label' => get_lang('fleet_trans_automatic')],
    ['value' => 'manual',    'label' => get_lang('fleet_trans_manual')],
];

// Fuel type options
$fuel_options = [
    ['value' => 'petrol',  'label' => get_lang('fleet_fuel_petrol')],
    ['value' => 'diesel',  'label' => get_lang('fleet_fuel_diesel')],
    ['value' => 'hybrid',  'label' => get_lang('fleet_fuel_hybrid')],
];
?>
<section class="page" id="<?= $page_element_id ?>" data-page-type="add" data-page-url="<?php print_link($current_page); ?>">
    <div>
        <div class="row">
            <div class="col-lg-8 comp-grid">
                <?php $this::display_page_errors(); ?>
                <div class="bg-light p-3 animated fadeIn page-content">
                    <form id="vehicle-form" role="form" novalidate enctype="multipart/form-data"
                          class="form page-form form-horizontal needs-validation"
                          action="<?php print_link("vehicles/manage" . ($is_edit ? "/$page_id" : "") . "?csrf_token=$csrf_token") ?>"
                          method="post">

                        <div class="row g-3">
                            <!-- Make -->
                            <div class="col-md-6">
                                <?php $comp_model->addInput([
                                    'name'     => 'make',
                                    'type'     => InputType::text,
                                    'label'    => get_lang('fleet_make'),
                                    'required' => true,
                                    'value'    => $this->set_field_value('make'),
                                ]); ?>
                            </div>

                            <!-- Model -->
                            <div class="col-md-6">
                                <?php $comp_model->addInput([
                                    'name'     => 'model',
                                    'type'     => InputType::text,
                                    'label'    => get_lang('fleet_model'),
                                    'required' => true,
                                    'value'    => $this->set_field_value('model'),
                                ]); ?>
                            </div>

                            <!-- Year -->
                            <div class="col-md-4">
                                <?php $comp_model->addInput([
                                    'name'     => 'year',
                                    'type'     => InputType::number,
                                    'label'    => get_lang('fleet_year'),
                                    'required' => true,
                                    'value'    => $this->set_field_value('year'),
                                    'other'    => 'min="1990" max="' . (date('Y') + 2) . '"',
                                ]); ?>
                            </div>

                            <!-- Body Type -->
                            <div class="col-md-4">
                                <?php $comp_model->addInput([
                                    'name'    => 'body_type',
                                    'type'    => InputType::select,
                                    'label'   => get_lang('fleet_body_type'),
                                    'options' => $body_type_options,
                                    'value'   => $this->set_field_value('body_type'),
                                ]); ?>
                            </div>

                            <!-- Seats -->
                            <div class="col-md-4">
                                <?php $comp_model->addInput([
                                    'name'     => 'seats',
                                    'type'     => InputType::number,
                                    'label'    => get_lang('fleet_seats'),
                                    'required' => true,
                                    'value'    => $this->set_field_value('seats') ?: 5,
                                    'other'    => 'min="1" max="20"',
                                ]); ?>
                            </div>

                            <!-- Transmission -->
                            <div class="col-md-4">
                                <?php $comp_model->addInput([
                                    'name'    => 'transmission',
                                    'type'    => InputType::select,
                                    'label'   => get_lang('fleet_transmission'),
                                    'options' => $transmission_options,
                                    'value'   => $this->set_field_value('transmission'),
                                ]); ?>
                            </div>

                            <!-- Fuel Type -->
                            <div class="col-md-4">
                                <?php $comp_model->addInput([
                                    'name'    => 'fuel_type',
                                    'type'    => InputType::select,
                                    'label'   => get_lang('fleet_fuel_type'),
                                    'options' => $fuel_options,
                                    'value'   => $this->set_field_value('fuel_type'),
                                ]); ?>
                            </div>

                            <!-- Price Per Day -->
                            <div class="col-md-4">
                                <?php $comp_model->addInput([
                                    'name'     => 'price_per_day',
                                    'type'     => InputType::number,
                                    'label'    => get_lang('fleet_price_per_day') . ' (USD)',
                                    'required' => true,
                                    'value'    => $this->set_field_value('price_per_day'),
                                    'other'    => 'min="0" step="0.01"',
                                ]); ?>
                            </div>

                            <!-- Mileage -->
                            <div class="col-md-6">
                                <?php $comp_model->addInput([
                                    'name'  => 'mileage',
                                    'type'  => InputType::text,
                                    'label' => get_lang('fleet_mileage'),
                                    'value' => $this->set_field_value('mileage'),
                                ]); ?>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <?php $comp_model->addInput([
                                    'name'    => 'status',
                                    'type'    => InputType::select,
                                    'label'   => get_lang('fleet_status'),
                                    'options' => $status_options,
                                    'value'   => $this->set_field_value('status') ?: Status::active,
                                ]); ?>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <?php $comp_model->addInput([
                                    'name'  => 'description',
                                    'type'  => InputType::textarea,
                                    'label' => get_lang('fleet_description'),
                                    'value' => $this->set_field_value('description'),
                                    'other' => 'rows="4"',
                                ]); ?>
                            </div>

                            <!-- Features -->
                            <div class="col-12">
                                <?php $comp_model->addInput([
                                    'name'      => 'features',
                                    'type'      => InputType::textarea,
                                    'label'     => get_lang('fleet_features'),
                                    'value'     => $this->set_field_value('features'),
                                    'other'     => 'rows="3"',
                                    'help_text' => get_lang('fleet_features_hint'),
                                ]); ?>
                            </div>

                            <!-- Cover Image -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label"><?= get_lang('fleet_image') ?></label>
                                    <div>
                                        <?php if (!empty($this->page_props['cover_image'])): ?>
                                        <div class="mb-2 d-flex align-items-center gap-3">
                                            <img src="<?= get_link(UPLOAD_FILE_DIR . $this->page_props['cover_image']) ?>"
                                                 style="height:90px;width:130px;object-fit:cover;border-radius:6px;"
                                                 alt="cover">
                                            <a class="btn btn-sm btn-danger record-delete-btn"
                                               href="<?php print_link("vehicles/delete_cover_image/{$this->page_props['id']}/?csrf_token=$csrf_token&redirect=$current_page") ?>"
                                               data-prompt-msg="<?= get_lang('delete_confirmation') ?>"
                                               data-display-style="modal">
                                                <i class="fa fa-times me-1"></i><?= get_lang('delete') ?>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"
                                                       name="cover_image" id="cover_image"
                                                       accept="image/jpeg,image/png,image/webp">
                                                <label class="custom-file-label" for="cover_image">
                                                    <?= get_lang('choose_file') ?>
                                                </label>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted"><?= get_lang('fleet_image_hint') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row -->

                        <div class="form-group form-submit-btn-holder text-center mt-4">
                            <div class="form-ajax-status"></div>
                            <a class="btn btn-outline-secondary me-2" href="<?php print_link('vehicles') ?>">
                                <i class="fa fa-arrow-left me-1"></i><?= get_lang('cancel') ?>
                            </a>
                            <button class="btn btn-primary" type="submit">
                                <?= get_lang('submit') ?> <i class="fa fa-save ms-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar tips -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3"><i class="fas fa-info-circle text-primary me-2"></i><?= get_lang('fleet_tips_title') ?></h6>
                        <ul class="small text-muted ps-3">
                            <li class="mb-1"><?= get_lang('fleet_tip_1') ?></li>
                            <li class="mb-1"><?= get_lang('fleet_tip_2') ?></li>
                            <li class="mb-1"><?= get_lang('fleet_tip_3') ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
