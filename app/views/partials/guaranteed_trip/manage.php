<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$page_id = $this->route->page_id;
$csrf_token = Csrf::$token;
$record = $this->view->page_props ?? [];
$cover_image = $record['cover_image'] ?? null;
?>
<section class="page" id="<?= $page_element_id ?>" data-page-type="add" data-page-url="<?php print_link($current_page); ?>">
    <div class="row">
        <div class="col-lg-8">
            <?php $this::display_page_errors(); ?>
            <div class="bg-light p-3 animated fadeIn page-content">
                <form id="client-add-form" role="form" novalidate enctype="multipart/form-data"
                      class="form page-form form-horizontal needs-validation"
                      action="<?php print_link("guaranteedtrip/manage" . (!empty($page_id) ? "/$page_id" : "") . "?csrf_token=$csrf_token") ?>"
                      method="post">

                    <h6 class="text-muted text-uppercase mb-3 border-bottom pb-2"><?= get_lang('gtrip_section_basic') ?></h6>

                    <?php
                    $comp_model->addInput([
                        'name'     => 'title',
                        'type'     => InputType::text,
                        'label'    => get_lang('gtrip_field_title'),
                        'required' => true,
                        'value'    => $this->set_field_value('title'),
                        'placeholder' => 'e.g. Namibia Discovery 2026',
                    ]);

                    $comp_model->addInput([
                        'name'     => 'subtitle',
                        'type'     => InputType::text,
                        'label'    => get_lang('gtrip_field_subtitle'),
                        'required' => false,
                        'value'    => $this->set_field_value('subtitle'),
                        'placeholder' => 'e.g. A guaranteed small-group departure',
                    ]);

                    $comp_model->addInput([
                        'name'     => 'destination',
                        'type'     => InputType::text,
                        'label'    => get_lang('gtrip_field_destination'),
                        'required' => false,
                        'value'    => $this->set_field_value('destination'),
                        'placeholder' => 'e.g. Namibia · Botswana · Zimbabwe',
                    ]);

                    $comp_model->addInput([
                        'name'     => 'badge',
                        'type'     => InputType::select,
                        'label'    => get_lang('gtrip_field_badge'),
                        'required' => false,
                        'value'    => $this->set_field_value('badge'),
                        'options'  => [
                            ['value' => 'Guaranteed',  'label' => get_lang('gtrip_badge_guaranteed')],
                            ['value' => 'Last Spots',  'label' => get_lang('gtrip_badge_last_spots')],
                            ['value' => 'Sold Out',    'label' => get_lang('gtrip_badge_sold_out')],
                            ['value' => 'Limited',     'label' => get_lang('gtrip_badge_limited')],
                            ['value' => 'New',         'label' => get_lang('gtrip_badge_new')],
                        ],
                    ]);

                    $comp_model->addInput([
                        'name'     => 'status',
                        'type'     => InputType::select,
                        'label'    => get_lang('gtrip_field_status'),
                        'required' => true,
                        'value'    => $this->set_field_value('status') ?? 1,
                        'options'  => [
                            ['value' => 1, 'label' => get_lang('gtrip_status_active')],
                            ['value' => 3, 'label' => get_lang('gtrip_status_inactive')],
                        ],
                    ]);
                    ?>

                    <h6 class="text-muted text-uppercase mb-3 border-bottom pb-2 mt-4"><?= get_lang('gtrip_section_dates') ?></h6>

                    <div class="row">
                        <div class="col-md-6">
                        <?php
                        $comp_model->addInput([
                            'name'     => 'departure_date',
                            'type'     => InputType::date,
                            'label'    => get_lang('gtrip_field_departure_date'),
                            'required' => true,
                            'value'    => $this->set_field_value('departure_date'),
                        ]);
                        ?>
                        </div>
                        <div class="col-md-6">
                        <?php
                        $comp_model->addInput([
                            'name'     => 'end_date',
                            'type'     => InputType::date,
                            'label'    => get_lang('gtrip_field_end_date'),
                            'required' => false,
                            'value'    => $this->set_field_value('end_date'),
                        ]);
                        ?>
                        </div>
                    </div>

                    <?php
                    $comp_model->addInput([
                        'name'     => 'duration',
                        'type'     => InputType::text,
                        'label'    => get_lang('gtrip_field_duration'),
                        'required' => false,
                        'value'    => $this->set_field_value('duration'),
                        'placeholder' => 'e.g. 15 Days / 14 Nights',
                    ]);
                    ?>

                    <h6 class="text-muted text-uppercase mb-3 border-bottom pb-2 mt-4"><?= get_lang('gtrip_section_pricing') ?></h6>

                    <div class="row">
                        <div class="col-md-4">
                        <?php
                        $comp_model->addInput([
                            'name'     => 'price',
                            'type'     => InputType::number,
                            'label'    => get_lang('gtrip_field_price'),
                            'required' => false,
                            'value'    => $this->set_field_value('price'),
                            'placeholder' => '2499',
                        ]);
                        ?>
                        </div>
                        <div class="col-md-4">
                        <?php
                        $comp_model->addInput([
                            'name'     => 'price_currency',
                            'type'     => InputType::select,
                            'label'    => get_lang('gtrip_field_currency'),
                            'required' => false,
                            'value'    => $this->set_field_value('price_currency') ?? 'USD',
                            'options'  => [
                                ['value' => 'USD', 'label' => 'USD — US Dollar'],
                                ['value' => 'EUR', 'label' => 'EUR — Euro'],
                                ['value' => 'GBP', 'label' => 'GBP — British Pound'],
                                ['value' => 'NAD', 'label' => 'NAD — Namibian Dollar'],
                                ['value' => 'ZAR', 'label' => 'ZAR — South African Rand'],
                            ],
                        ]);
                        ?>
                        </div>
                        <div class="col-md-4">
                        <?php
                        $comp_model->addInput([
                            'name'     => 'price_label',
                            'type'     => InputType::text,
                            'label'    => get_lang('gtrip_field_price_label'),
                            'required' => false,
                            'value'    => $this->set_field_value('price_label'),
                            'placeholder' => 'e.g. From $2,499 pp',
                        ]);
                        ?>
                        </div>
                    </div>

                    <h6 class="text-muted text-uppercase mb-3 border-bottom pb-2 mt-4"><?= get_lang('gtrip_section_availability') ?></h6>

                    <div class="row">
                        <div class="col-md-6">
                        <?php
                        $comp_model->addInput([
                            'name'     => 'spots_available',
                            'type'     => InputType::number,
                            'label'    => get_lang('gtrip_field_spots_available'),
                            'required' => false,
                            'value'    => $this->set_field_value('spots_available'),
                            'placeholder' => '12',
                        ]);
                        ?>
                        </div>
                        <div class="col-md-6">
                        <?php
                        $comp_model->addInput([
                            'name'     => 'spots_left',
                            'type'     => InputType::number,
                            'label'    => get_lang('gtrip_field_spots_left'),
                            'required' => false,
                            'value'    => $this->set_field_value('spots_left'),
                            'placeholder' => '5',
                        ]);
                        ?>
                        </div>
                    </div>

                    <h6 class="text-muted text-uppercase mb-3 border-bottom pb-2 mt-4"><?= get_lang('gtrip_section_content') ?></h6>

                    <?php
                    $comp_model->addInput([
                        'name'     => 'description',
                        'type'     => InputType::textarea,
                        'label'    => get_lang('gtrip_field_description'),
                        'required' => false,
                        'value'    => $this->set_field_value('description'),
                        'class'    => 'tinymce',
                    ]);

                    $comp_model->addInput([
                        'name'     => 'highlights',
                        'type'     => InputType::textarea,
                        'label'    => get_lang('gtrip_field_highlights'),
                        'required' => false,
                        'value'    => $this->set_field_value('highlights'),
                        'placeholder' => 'One highlight per line',
                    ]);

                    $comp_model->addInput([
                        'name'     => 'includes_text',
                        'type'     => InputType::textarea,
                        'label'    => get_lang('gtrip_field_includes'),
                        'required' => false,
                        'value'    => $this->set_field_value('includes_text'),
                        'placeholder' => 'One item per line',
                    ]);
                    ?>

                    <h6 class="text-muted text-uppercase mb-3 border-bottom pb-2 mt-4"><?= get_lang('gtrip_section_image') ?></h6>

                    <div class="mb-3">
                        <label class="form-label"><?= get_lang('gtrip_field_cover_image') ?></label>
                        <?php if (!empty($cover_image)): ?>
                        <div class="mb-2">
                            <img src="<?= SITE_ADDR . UPLOAD_FILE_DIR . htmlspecialchars($cover_image) ?>"
                                 alt="Cover" style="max-height:160px; border-radius:6px; object-fit:cover;">
                            <p class="text-muted small mt-1"><?= get_lang('gtrip_image_hint') ?></p>
                        </div>
                        <?php endif; ?>
                        <input type="file" name="cover_image" class="form-control" accept="image/jpeg,image/png,image/webp">
                        <small class="text-muted"><?= get_lang('gtrip_image_hint') ?></small>
                    </div>

                    <div class="form-group form-submit-btn-holder text-center mt-4">
                        <div class="form-ajax-status"></div>
                        <a href="<?= get_link('guaranteedtrip') ?>" class="btn btn-secondary me-2">
                            <i class="fas fa-arrow-left"></i> <?php print_lang('cancel'); ?>
                        </a>
                        <button class="btn btn-primary" type="submit">
                            <?php print_lang('submit'); ?> <i class="fas fa-save"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-3"><i class="fas fa-lightbulb text-warning me-2"></i><?= get_lang('gtrip_tips_title') ?></h6>
                    <ul class="small text-muted ps-3">
                        <li class="mb-2"><?= get_lang('gtrip_tip_1') ?></li>
                        <li class="mb-2"><?= get_lang('gtrip_tip_2') ?></li>
                        <li class="mb-2"><?= get_lang('gtrip_tip_3') ?></li>
                        <li class="mb-2"><?= get_lang('gtrip_tip_4') ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
