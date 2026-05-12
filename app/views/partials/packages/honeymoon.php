<?php /* Package category: Honeymoon — content from namwel.com.na/lune-de-miel/ */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('<?= SITE_ADDR ?>assets/images/travel/destinations/pt-namibia.jpg') center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2"><?= get_lang('pkgs_honeymoon_page_title') ?></h1>
        <p class="lead mb-3"><?= get_lang('pkgs_honeymoon_page_subtitle') ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('packages/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_packages') ?></a></li>
                <li class="breadcrumb-item active text-white notranslate"><?= get_lang('pkgs_honeymoon_page_title') ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- What to Expect -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="badge text-bg-danger mb-2 px-3 py-2"><i class="fas fa-heart me-1"></i><?= get_lang('pkgs_badge_romance') ?></span>
                <h2 class="fw-bold mb-3"><?= get_lang('pkgs_honeymoon_section_title') ?></h2>
                <p class="text-muted"><?= get_lang('pkgs_honeymoon_intro_1') ?></p>
                <p class="text-muted"><?= get_lang('pkgs_honeymoon_intro_2') ?></p>
                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-car text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('pkgs_honeymoon_feat1_title') ?></strong><span class="text-muted small"><?= get_lang('pkgs_honeymoon_feat1_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-wine-glass text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('pkgs_honeymoon_feat2_title') ?></strong><span class="text-muted small"><?= get_lang('pkgs_honeymoon_feat2_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-spa text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('pkgs_honeymoon_feat3_title') ?></strong><span class="text-muted small"><?= get_lang('pkgs_honeymoon_feat3_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-gift text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('pkgs_honeymoon_feat4_title') ?></strong><span class="text-muted small"><?= get_lang('pkgs_honeymoon_feat4_sub') ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/pt-namibia.jpg" class="img-fluid rounded-4 shadow" alt="Namibia Honeymoon">
            </div>
        </div>
    </div>
</section>

<!-- Honeymoon Packages -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('pkgs_honeymoon_packages_title') ?></h2>
            <p class="text-muted"><?= get_lang('pkgs_honeymoon_packages_desc') ?></p>
        </div>
        <div class="row g-4">

            <!-- Classic Namibia -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:210px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg" class="w-100 h-100" alt="Classic Namibia" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 start-0 m-3 badge bg-danger"><i class="fas fa-heart me-1"></i><?= get_lang('pkgs_badge_popular') ?></span>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75"><?= get_lang('pkgs_honeymoon_classic_duration') ?></span>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h5 class="mb-0 fw-bold"><?= get_lang('pkgs_honeymoon_classic_title') ?></h5>
                            <small><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('pkgs_honeymoon_classic_route') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_honeymoon_classic_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_classic_feat1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_classic_feat2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_classic_feat3') ?></li>
                        </ul>
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div>
                                <span class="fw-bold text-primary"><?= get_lang('pkgs_on_request') ?></span>
                                <small class="text-muted d-block"><?= get_lang('pkgs_per_couple') ?></small>
                            </div>
                            <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_request_this') ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Namibia–Botswana–Zimbabwe -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:210px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="w-100 h-100" alt="Namibia Botswana Zimbabwe Honeymoon" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark"><i class="fas fa-star me-1"></i><?= get_lang('pkgs_badge_premium') ?></span>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75"><?= get_lang('pkgs_honeymoon_nbz_duration') ?></span>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h5 class="mb-0 fw-bold"><?= get_lang('pkgs_honeymoon_nbz_title') ?></h5>
                            <small><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('pkgs_honeymoon_nbz_sub') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_honeymoon_nbz_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_nbz_feat1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_nbz_feat2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_nbz_feat3') ?></li>
                        </ul>
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div>
                                <span class="fw-bold text-primary"><?= get_lang('pkgs_from') ?> $2,499</span>
                                <small class="text-muted d-block"><?= get_lang('pkgs_per_couple') ?></small>
                            </div>
                            <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_request_this') ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Safari & Stars -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:210px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/Elephants.png" class="w-100 h-100" alt="Safari and Stars Honeymoon" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 start-0 m-3 badge bg-success"><i class="fas fa-moon me-1"></i><?= get_lang('pkgs_badge_stargazing') ?></span>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75"><?= get_lang('pkgs_honeymoon_stars_duration') ?></span>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h5 class="mb-0 fw-bold"><?= get_lang('pkgs_honeymoon_stars_title') ?></h5>
                            <small><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('pkgs_honeymoon_stars_route') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_honeymoon_stars_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_stars_feat1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_stars_feat2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('pkgs_honeymoon_stars_feat3') ?></li>
                        </ul>
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div>
                                <span class="fw-bold text-primary"><?= get_lang('pkgs_from') ?> $2,199</span>
                                <small class="text-muted d-block"><?= get_lang('pkgs_per_couple') ?></small>
                            </div>
                            <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_request_this') ?></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Good to know + CTA -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3"><?= get_lang('pkgs_good_to_know_title') ?></h3>
                <ul class="text-muted mb-0">
                    <li class="mb-2"><?= get_lang('pkgs_honeymoon_good_know_1') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_honeymoon_good_know_2') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_honeymoon_good_know_3') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_honeymoon_good_know_4') ?></li>
                </ul>
            </div>
            <div class="col-lg-4 d-flex flex-column gap-2">
                <a href="<?= get_link('index/quote') ?>" class="btn btn-primary w-100">
                    <i class="fas fa-paper-plane me-2"></i><?= get_lang('pkgs_request_a_quote_btn') ?>
                </a>
                <a href="<?= get_link('destinations/index') ?>" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-globe me-2"></i><?= get_lang('pkgs_explore_destinations') ?>
                </a>
            </div>
        </div>
    </div>
</section>