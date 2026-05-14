<?php
$view_data = $this->view_data;
$vehicles  = $view_data->vehicles;
$filters   = $view_data->filters;

$body_type_labels = [
    CarBodyType::sedan        => get_lang('fleet_body_sedan'),
    CarBodyType::suv          => get_lang('fleet_body_suv'),
    CarBodyType::pickup_truck => get_lang('fleet_body_pickup'),
];

$body_type_icons = [
    CarBodyType::sedan        => 'fa-car',
    CarBodyType::suv          => 'fa-truck-pickup',
    CarBodyType::pickup_truck => 'fa-truck',
];
?>

<!-- Page Hero -->
<section class="page-hero packages-hero notranslate"
         style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)),
                url('<?= SITE_ADDR ?>assets/images/car-rental-banner-2.png') center/cover no-repeat;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-5 fw-bold mb-2"><?= get_lang('rental_page_title') ?></h1>
            <p class="lead mb-3"><?= get_lang('rental_page_desc') ?></p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a href="<?= get_link('index/index') ?>" class="text-white-50"><?= get_lang('breadcrumb_home') ?></a>
                    </li>
                    <li class="breadcrumb-item active text-white"><?= get_lang('rental_page_title') ?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Value Props Strip -->
<div class="bg-vibrant-green text-white py-3">
    <div class="container">
        <div class="row text-center g-2">
            <div class="col-6 col-md-3 notranslate">
                <i class="fas fa-shield-alt me-2"></i><?= get_lang('rental_prop_insured') ?>
            </div>
            <div class="col-6 col-md-3 notranslate">
                <i class="fas fa-map-marked-alt me-2"></i><?= get_lang('rental_prop_routes') ?>
            </div>
            <div class="col-6 col-md-3 notranslate">
                <i class="fas fa-headset me-2"></i><?= get_lang('rental_prop_support') ?>
            </div>
            <div class="col-6 col-md-3 notranslate">
                <i class="fas fa-gas-pump me-2"></i><?= get_lang('rental_prop_fuel') ?>
            </div>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<section class="py-4 bg-light border-bottom">
    <div class="container">
        <form method="get" action="<?= get_link('rental') ?>" class="row g-3 align-items-end notranslate">
            <!-- Body Type -->
            <div class="col-sm-6 col-md-3">
                <label class="form-label fw-semibold small"><?= get_lang('fleet_body_type') ?></label>
                <select name="body_type" class="form-select form-select-sm">
                    <option value=""><?= get_lang('rental_filter_all') ?></option>
                    <option value="<?= CarBodyType::sedan ?>"
                        <?= ($filters['body_type'] == CarBodyType::sedan ? 'selected' : '') ?>>
                        <?= get_lang('fleet_body_sedan') ?>
                    </option>
                    <option value="<?= CarBodyType::suv ?>"
                        <?= ($filters['body_type'] == CarBodyType::suv ? 'selected' : '') ?>>
                        <?= get_lang('fleet_body_suv') ?>
                    </option>
                    <option value="<?= CarBodyType::pickup_truck ?>"
                        <?= ($filters['body_type'] == CarBodyType::pickup_truck ? 'selected' : '') ?>>
                        <?= get_lang('fleet_body_pickup') ?>
                    </option>
                </select>
            </div>

            <!-- Transmission -->
            <div class="col-sm-6 col-md-3">
                <label class="form-label fw-semibold small"><?= get_lang('fleet_transmission') ?></label>
                <select name="transmission" class="form-select form-select-sm">
                    <option value=""><?= get_lang('rental_filter_all') ?></option>
                    <option value="automatic" <?= ($filters['transmission'] === 'automatic' ? 'selected' : '') ?>>
                        <?= get_lang('fleet_trans_automatic') ?>
                    </option>
                    <option value="manual" <?= ($filters['transmission'] === 'manual' ? 'selected' : '') ?>>
                        <?= get_lang('fleet_trans_manual') ?>
                    </option>
                </select>
            </div>

            <!-- Max Price -->
            <div class="col-sm-6 col-md-3">
                <label class="form-label fw-semibold small"><?= get_lang('rental_max_price') ?> (USD)</label>
                <input type="number" name="max_price" class="form-control form-control-sm"
                       placeholder="e.g. 150"
                       value="<?= htmlspecialchars($filters['max_price']) ?>" min="0" step="10">
            </div>

            <!-- Buttons -->
            <div class="col-sm-6 col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm flex-fill">
                    <i class="fas fa-filter me-1"></i><?= get_lang('rental_filter_apply') ?>
                </button>
                <a href="<?= get_link('rental') ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </form>
    </div>
</section>

<!-- Vehicle Grid -->
<section class="py-5">
    <div class="container">
        <?php if (empty($vehicles)): ?>
        <div class="text-center py-5">
            <i class="fas fa-car fa-3x text-muted mb-3"></i>
            <h4 class="text-muted"><?= get_lang('rental_no_vehicles') ?></h4>
            <a href="<?= get_link('rental') ?>" class="btn btn-outline-primary mt-3 notranslate">
                <?= get_lang('rental_clear_filters') ?>
            </a>
        </div>
        <?php else: ?>

        <div class="row g-4">
            <?php foreach ($vehicles as $v):
                $bt_label = $body_type_labels[$v['body_type']] ?? '';
                $bt_icon  = $body_type_icons[$v['body_type']] ?? 'fa-car';
                $features = !empty($v['features'])
                    ? array_filter(array_map('trim', explode(',', html_entity_decode($v['features']))))
                    : [];
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">

                    <!-- Vehicle Image -->
                    <div class="position-relative" style="height:200px;overflow:hidden;">
                        <?php if (!empty($v['cover_image'])): ?>
                            <img src="<?= get_link(UPLOAD_FILE_DIR . $v['cover_image']) ?>"
                                 class="w-100 h-100" style="object-fit:cover;"
                                 alt="<?= htmlspecialchars($v['make'] . ' ' . $v['model']) ?>">
                        <?php else: ?>
                            <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                <i class="fas <?= $bt_icon ?> fa-4x text-muted opacity-25"></i>
                            </div>
                        <?php endif; ?>

                        <!-- Body type badge -->
                        <span class="position-absolute top-0 start-0 m-3 badge bg-dark bg-opacity-75 notranslate">
                            <i class="fas <?= $bt_icon ?> me-1"></i><?= $bt_label ?>
                        </span>

                        <!-- Price badge -->
                        <div class="position-absolute bottom-0 end-0 m-3">
                            <span class="badge bg-primary fs-6 notranslate">
                                $<?= number_format($v['price_per_day'], 0) ?><small class="fw-normal opacity-75">
                                /<?= get_lang('fleet_day') ?></small>
                            </span>
                        </div>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <!-- Title -->
                        <h5 class="fw-bold mb-1 notranslate">
                            <?= htmlspecialchars($v['make'] . ' ' . $v['model']) ?>
                        </h5>

                        <!-- Specs row -->
                        <div class="d-flex flex-wrap gap-2 mb-3 small text-muted notranslate">
                            <span><i class="fas fa-users me-1"></i><?= $v['seats'] ?> <?= get_lang('rental_seats') ?></span>
                            <span><i class="fas fa-cog me-1"></i><?= ucfirst($v['transmission']) ?></span>
                            <span><i class="fas fa-gas-pump me-1"></i><?= ucfirst($v['fuel_type']) ?></span>
                            <?php if (!empty($v['mileage'])): ?>
                            <span><i class="fas fa-tachometer-alt me-1"></i><?= htmlspecialchars($v['mileage']) ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Description (clipped) -->
                        <?php if (!empty($v['description'])): ?>
                        <p class="text-muted small flex-grow-1 mb-3"
                           style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                            <?= html_entity_decode($v['description']) ?>
                        </p>
                        <?php else: ?>
                        <div class="flex-grow-1"></div>
                        <?php endif; ?>

                        <!-- Feature pills -->
                        <?php if (!empty($features)): ?>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <?php foreach (array_slice($features, 0, 4) as $feat): ?>
                            <span class="badge text-bg-light border small"><?= htmlspecialchars($feat) ?></span>
                            <?php endforeach; ?>
                            <?php if (count($features) > 4): ?>
                            <span class="badge text-bg-light border small">+<?= count($features) - 4 ?></span>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <!-- CTA Buttons -->
                        <div class="d-grid gap-2 mt-auto">
                            <a href="<?= get_link('index/quote') ?>?vehicle=<?= urlencode($v['make'] . ' ' . $v['model']) ?>"
                               class="btn btn-primary notranslate">
                                <i class="fas fa-calendar-check me-2"></i><?= get_lang('rental_book_now') ?>
                            </a>
                            <a href="<?= get_link('index/contact') ?>"
                               class="btn btn-outline-secondary btn-sm notranslate">
                                <i class="fas fa-envelope me-1"></i><?= get_lang('rental_enquire') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php endif; ?>
    </div>
</section>

<!-- Tailor-Made CTA -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-2 notranslate"><?= get_lang('rental_cta_title') ?></h3>
                <p class="text-muted mb-0 notranslate"><?= get_lang('rental_cta_desc') ?></p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?= get_link('index/quote') ?>" class="btn btn-primary btn-lg notranslate">
                    <i class="fas fa-paper-plane me-2"></i><?= get_lang('nav_request_quote') ?>
                </a>
            </div>
        </div>
    </div>
</section>
