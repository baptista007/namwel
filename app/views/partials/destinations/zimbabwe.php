<?php /* Destination: Zimbabwe (mapped to zambia.php – see DestinationsController) */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg')center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2"><?= get_lang('country_zimbabwe') ?></h1>
        <p class="lead mb-3"><?= get_lang('dest_zimbabwe_subtitle') ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('destinations/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_destinations') ?></a></li>
                <li class="breadcrumb-item active text-white notranslate"><?= get_lang('country_zimbabwe') ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Overview -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="badge text-bg-secondary mb-2 px-3 py-2"><?= get_lang('dest_southern_africa') ?></span>
                <h2 class="fw-bold mb-3"><?= get_lang('dest_travel_overview') ?></h2>
                <p class="text-muted"><?= get_lang('dest_zimbabwe_overview') ?></p>
                <div class="row g-3 mt-2">
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-city text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_capital') ?></strong><span class="text-muted small">Harare</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-ruler-combined text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_area') ?></strong><span class="text-muted small">390 580 km²</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-language text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_language') ?></strong><span class="text-muted small">English, Shona, Ndebele</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-users text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_population') ?></strong><span class="text-muted small">14.5 million</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-coins text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_currency') ?></strong><span class="text-muted small">ZiG (Zimbabwe Gold)</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-map text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_regions') ?></strong><span class="text-muted small">10</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="img-fluid rounded-4 shadow" alt="Victoria Falls Zimbabwe">
            </div>
        </div>
    </div>
</section>

<!-- Must-See Places -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('dest_zimbabwe_mustsee_title') ?></h2>
            <p class="text-muted"><?= get_lang('dest_zimbabwe_mustsee_desc') ?></p>
        </div>
        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/nike159-victoria-falls-2042641_640.jpg" class="card-img-top" alt="Victoria Falls" style="height:200px; object-fit:cover;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0"><?= get_lang('dest_zimbabwe_place1_title') ?></h5>
                            <span class="badge bg-info text-dark small"><?= get_lang('dest_ask_us') ?></span>
                        </div>
                        <p class="text-muted small mb-2"><?= get_lang('dest_zimbabwe_place1_desc') ?></p>
                        <p class="text-muted small mb-3"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/Elephants.png" class="card-img-top" alt="Hwange National Park" style="height:200px; object-fit:cover;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0"><?= get_lang('dest_zimbabwe_place2_title') ?></h5>
                            <span class="badge bg-info text-dark small"><?= get_lang('dest_ask_us') ?></span>
                        </div>
                        <p class="text-muted small mb-2"><?= get_lang('dest_zimbabwe_place2_desc') ?></p>
                        <p class="text-muted small mb-3"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/zambia.jpg" class="card-img-top" alt="Matobo Hills" style="height:200px; object-fit:cover;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0"><?= get_lang('dest_zimbabwe_place3_title') ?></h5>
                            <span class="badge bg-info text-dark small"><?= get_lang('dest_ask_us') ?></span>
                        </div>
                        <p class="text-muted small mb-2"><?= get_lang('dest_zimbabwe_place3_desc') ?></p>
                        <p class="text-muted small mb-3"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_good_year_round') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><i class="fas fa-monument text-primary me-2"></i><?= get_lang('dest_zimbabwe_place4_title') ?></h5>
                        <p class="text-muted small mb-0"><?= get_lang('dest_zimbabwe_place4_desc') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><i class="fas fa-ship text-primary me-2"></i><?= get_lang('dest_zimbabwe_place5_title') ?></h5>
                        <p class="text-muted small mb-0"><?= get_lang('dest_zimbabwe_place5_desc') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><i class="fas fa-binoculars text-primary me-2"></i><?= get_lang('dest_zimbabwe_place6_title') ?></h5>
                        <p class="text-muted small mb-0"><?= get_lang('dest_zimbabwe_place6_desc') ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h3 class="fw-bold mb-3"><?= get_lang('dest_zimbabwe_cta_title') ?></h3>
        <p class="text-muted mb-4"><?= get_lang('dest_zimbabwe_cta_desc') ?></p>
        <a href="<?= get_link('index/quote') ?>" class="btn btn-primary px-4">
            <i class="fas fa-paper-plane me-2"></i><?= get_lang('dest_request_free_quote') ?>
        </a>
    </div>
</section>