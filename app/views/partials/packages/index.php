<?php /* Packages index */ ?>

<!-- Page Hero -->
<section class="page-hero packages-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg') center/cover no-repeat;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-5 fw-bold mb-2 notranslate"><?= get_lang('pkgs_page_title') ?></h1>
            <p class="lead mb-3 notranslate"><?= get_lang('pkgs_page_desc') ?></p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                    <li class="breadcrumb-item active text-white notranslate"><?= get_lang('pkgs_page_title') ?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Category Cards -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold notranslate"><?= get_lang('pkgs_choose_title') ?></h2>
            <p class="text-muted notranslate"><?= get_lang('pkgs_choose_desc') ?></p>
        </div>
        <div class="row g-4">

            <!-- Special Offers -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="w-100 h-100" alt="<?= get_lang('nav_special_offers') ?>" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-danger"><?= get_lang('pkgs_badge_deals') ?></span>
                        <h4 class="position-absolute bottom-0 start-0 p-3 mb-0 text-white fw-bold notranslate"><?= get_lang('nav_special_offers') ?></h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted flex-grow-1"><?= get_lang('pkgs_special_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_special_feature_1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_special_feature_2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_special_feature_3') ?></li>
                        </ul>
                        <a href="<?= get_link('packages/special_offers') ?>" class="btn btn-primary w-100 notranslate"><?= get_lang('pkgs_view_offers') ?> <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Honeymoon -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/pt-namibia.jpg" class="w-100 h-100" alt="<?= get_lang('nav_honeymoon') ?>" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-danger"><i class="fas fa-heart me-1"></i><?= get_lang('pkgs_badge_romance') ?></span>
                        <h4 class="position-absolute bottom-0 start-0 p-3 mb-0 text-white fw-bold notranslate"><?= get_lang('nav_honeymoon') ?></h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted flex-grow-1"><?= get_lang('pkgs_honeymoon_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_feature_1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_feature_2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_feature_3') ?></li>
                        </ul>
                        <a href="<?= get_link('packages/honeymoon') ?>" class="btn btn-primary w-100 notranslate"><?= get_lang('pkgs_view_honeymoon') ?> <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Camping & Overland -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/Botswana_Okavango.jpg" class="w-100 h-100" alt="<?= get_lang('nav_camping') ?>" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-success"><i class="fas fa-campground me-1"></i><?= get_lang('pkgs_badge_adventure') ?></span>
                        <h4 class="position-absolute bottom-0 start-0 p-3 mb-0 text-white fw-bold notranslate"><?= get_lang('nav_camping') ?></h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted flex-grow-1"><?= get_lang('pkgs_camping_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_camping_feature_1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_camping_feature_2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_camping_feature_3') ?></li>
                        </ul>
                        <a href="<?= get_link('packages/camping') ?>" class="btn btn-primary w-100 notranslate"><?= get_lang('pkgs_view_camping') ?> <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Multi-country Tours -->
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge text-bg-secondary mb-2 px-3 py-2 notranslate"><?= get_lang('pkgs_featured_badge') ?></span>
            <h2 class="fw-bold notranslate"><?= get_lang('pkgs_featured_title') ?></h2>
            <p class="text-muted notranslate"><?= get_lang('pkgs_featured_desc') ?></p>
        </div>
        <div class="row g-4">

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="img-fluid h-100" alt="Treasure of Southern Africa" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-warning text-dark"><?= get_lang('pkgs_badge_best_seller') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_days_15') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_treasure_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_treasure_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_treasure_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_from') ?> $2,499</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$2,999</small>
                                    </div>
                                    <a class="btn btn-primary package-btn notranslate" href="<?= get_link('packages/treasure_southern_africa') ?>">
                                        <?= get_lang('pkgs_view_details') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/Elephants.png" class="img-fluid h-100" alt="Fascinating Southern Africa" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-primary"><?= get_lang('pkgs_badge_premium') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_days_17') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_fascinating_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_okavango_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_fascinating_short_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_from') ?> $3,499</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$4,199</small>
                                    </div>
                                    <a class="btn btn-primary package-btn notranslate" href="<?= get_link('packages/fascinating_southern_africa') ?>">
                                        <?= get_lang('pkgs_view_details') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg" class="img-fluid h-100" alt="Namibian Great Outdoors" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-success"><?= get_lang('pkgs_badge_popular') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_days_14') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_great_outdoors_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_great_spaces_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_great_outdoors_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_from') ?> $1,899</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$2,299</small>
                                    </div>
                                    <a class="btn btn-primary package-btn notranslate" href="<?= get_link('packages/fascinating_southern_africa') ?>">
                                        <?= get_lang('pkgs_view_details') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/aerial-view-of-the-okavango-delta-channels-and-landscape.jpg" class="img-fluid h-100" alt="Okavango" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-info text-dark"><?= get_lang('pkgs_badge_unique') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_days_7') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_okavango_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_okavango_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_okavango_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_from') ?> $2,799</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$3,399</small>
                                    </div>
                                    <a class="btn btn-primary package-btn notranslate" href="<?= get_link('packages/a_stroll_around_okavango') ?>">
                                        <?= get_lang('pkgs_view_details') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tailor-made CTA -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-8">
                <div class="p-4 p-lg-5 border rounded-4 h-100 bg-light">
                    <h3 class="fw-bold mb-2 notranslate"><?= get_lang('pkgs_tailor_title') ?></h3>
                    <p class="text-muted mb-3 notranslate"><?= get_lang('pkgs_tailor_desc') ?></p>
                    <ul class="list-inline mb-0 small text-muted notranslate">
                        <li class="list-inline-item me-3"><i class="fas fa-check text-success me-1"></i><?= get_lang('pkgs_tailor_free') ?></li>
                        <li class="list-inline-item me-3"><i class="fas fa-check text-success me-1"></i><?= get_lang('pkgs_tailor_fees') ?></li>
                        <li class="list-inline-item"><i class="fas fa-check text-success me-1"></i><?= get_lang('pkgs_tailor_reply') ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 p-lg-5 border rounded-4 shadow-sm h-100 d-flex flex-column justify-content-between bg-white">
                    <div>
                        <h4 class="fw-bold mb-2 notranslate"><?= get_lang('pkgs_request_quote') ?></h4>
                        <p class="text-muted mb-0 notranslate"><?= get_lang('pkgs_request_quote_desc') ?></p>
                    </div>
                    <a href="<?= get_link('index/quote') ?>" class="btn btn-primary mt-4 w-100 notranslate">
                        <i class="fas fa-paper-plane me-2"></i><?= get_lang('pkgs_request_quote_btn') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>