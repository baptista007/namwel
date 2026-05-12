<?php /* Destination: South Africa */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/south-africa.jpg')center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2"><?= get_lang('country_south_africa') ?></h1>
        <p class="lead mb-3"><?= get_lang('dest_south_africa_subtitle') ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('destinations/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_destinations') ?></a></li>
                <li class="breadcrumb-item active text-white notranslate"><?= get_lang('country_south_africa') ?></li>
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
                <p class="text-muted"><?= get_lang('dest_south_africa_overview') ?></p>
                <div class="row g-3 mt-2">
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-city text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_capital') ?></strong><span class="text-muted small">Pretoria &amp; Cape Town</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-ruler-combined text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_area') ?></strong><span class="text-muted small">1 221 037 km²</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-language text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_language') ?></strong><span class="text-muted small">English + 11 others</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-users text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_population') ?></strong><span class="text-muted small">60.1 million</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-coins text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_currency') ?></strong><span class="text-muted small">South African Rand (ZAR)</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-map text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('dest_regions') ?></strong><span class="text-muted small">9</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/south-africa.jpeg" class="img-fluid rounded-4 shadow" alt="South Africa">
            </div>
        </div>
    </div>
</section>

<!-- Must-See Places -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('dest_south_africa_mustsee_title') ?></h2>
            <p class="text-muted"><?= get_lang('dest_south_africa_mustsee_desc') ?></p>
        </div>
        <div class="row g-4">

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/south-africa.jpeg" class="img-fluid h-100" alt="Table Mountain" style="object-fit:cover; min-height:180px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-1">
                                    <h5 class="fw-bold mb-0"><?= get_lang('dest_south_africa_place1_title') ?></h5>
                                </div>
                                <p class="text-muted small mb-2"><?= get_lang('dest_south_africa_place1_desc') ?></p>
                                <p class="text-muted small"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary mt-2"><?= get_lang('dest_get_a_quote') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/lions-kruger.jpg" class="img-fluid h-100" alt="Kruger National Park" style="object-fit:cover; min-height:180px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-1">
                                    <h5 class="fw-bold mb-0"><?= get_lang('dest_south_africa_place2_title') ?></h5>
                                </div>
                                <p class="text-muted small mb-2"><?= get_lang('dest_south_africa_place2_desc') ?></p>
                                <p class="text-muted small"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary mt-2"><?= get_lang('dest_get_a_quote') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/national-park.jpg" class="img-fluid h-100" alt="Garden Route" style="object-fit:cover; min-height:180px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-1">
                                    <h5 class="fw-bold mb-0"><?= get_lang('dest_south_africa_place3_title') ?></h5>
                                </div>
                                <p class="text-muted small mb-2"><?= get_lang('dest_south_africa_place3_desc') ?></p>
                                <p class="text-muted small"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary mt-2"><?= get_lang('dest_get_a_quote') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/south-africa.jpg" class="img-fluid h-100" alt="Drakensberg" style="object-fit:cover; min-height:180px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-1">
                                    <h5 class="fw-bold mb-0"><?= get_lang('dest_south_africa_place4_title') ?></h5>
                                </div>
                                <p class="text-muted small mb-2"><?= get_lang('dest_south_africa_place4_desc') ?></p>
                                <p class="text-muted small"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary mt-2"><?= get_lang('dest_get_a_quote') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FAQ -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('dest_south_africa_faq_title') ?></h2>
            <p class="text-muted"><?= get_lang('dest_south_africa_faq_subtitle') ?></p>
        </div>
        <div class="row g-3 justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="saFaq">

                    <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                <?= get_lang('dest_south_africa_faq1_q') ?>
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#saFaq">
                            <div class="accordion-body text-muted small"><?= get_lang('dest_south_africa_faq1_a') ?></div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                <?= get_lang('dest_south_africa_faq2_q') ?>
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#saFaq">
                            <div class="accordion-body text-muted small"><?= get_lang('dest_south_africa_faq2_a') ?></div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                <?= get_lang('dest_south_africa_faq3_q') ?>
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#saFaq">
                            <div class="accordion-body text-muted small"><?= get_lang('dest_south_africa_faq3_a') ?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-3"><?= get_lang('dest_south_africa_cta_title') ?></h3>
        <p class="text-muted mb-4"><?= get_lang('dest_south_africa_cta_desc') ?></p>
        <a href="<?= get_link('index/quote') ?>" class="btn btn-primary px-4">
            <i class="fas fa-paper-plane me-2"></i><?= get_lang('dest_request_free_quote') ?>
        </a>
    </div>
</section>