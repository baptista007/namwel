<?php /* Destinations index */ ?>

<!-- Page Hero -->
<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/Elephants.png')center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2"><?= get_lang('dest_page_title') ?></h1>
        <p class="lead mb-3"><?= get_lang('dest_page_desc') ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item active text-white notranslate"><?= get_lang('dest_page_title') ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Destination Cards -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('dest_choose') ?></h2>
            <p class="text-muted"><?= get_lang('dest_choose_desc') ?></p>
        </div>
        <div class="row g-4">

            <!-- Namibia -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/pt-namibia.jpg" class="w-100 h-100" alt="Namibia" style="object-fit:cover; transition: transform 0.4s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.7));"></div>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h4 class="fw-bold mb-0"><?= get_lang('country_namibia') ?></h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('dest_southern_africa') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1"><?= get_lang('dest_namibia_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_namibia_highlight1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_namibia_highlight2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_best_season') ?> May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/namibia') ?>" class="btn btn-primary w-100">
                            <?= get_lang('dest_explore') ?> <?= get_lang('country_namibia') ?> <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Botswana -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/Botswana_Okavango.jpg" class="w-100 h-100" alt="Botswana" style="object-fit:cover; transition: transform 0.4s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.7));"></div>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h4 class="fw-bold mb-0"><?= get_lang('country_botswana') ?></h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('dest_southern_africa') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1"><?= get_lang('dest_botswana_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_botswana_highlight1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_botswana_highlight2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_best_season') ?> May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/botswana') ?>" class="btn btn-primary w-100">
                            <?= get_lang('dest_explore') ?> <?= get_lang('country_botswana') ?> <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Zimbabwe -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="w-100 h-100" alt="Zimbabwe" style="object-fit:cover; transition: transform 0.4s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.7));"></div>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h4 class="fw-bold mb-0"><?= get_lang('country_zimbabwe') ?></h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('dest_southern_africa') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1"><?= get_lang('dest_zimbabwe_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_zimbabwe_highlight1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_zimbabwe_highlight2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_best_season') ?> May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/zimbabwe') ?>" class="btn btn-primary w-100">
                            <?= get_lang('dest_explore') ?> <?= get_lang('country_zimbabwe') ?> <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- South Africa -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/south-africa.jpeg" class="w-100 h-100" alt="South Africa" style="object-fit:cover; transition: transform 0.4s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.7));"></div>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h4 class="fw-bold mb-0"><?= get_lang('country_south_africa') ?></h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('dest_southern_africa') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1"><?= get_lang('dest_south_africa_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_south_africa_highlight1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_south_africa_highlight2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_best_season') ?> May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/south_africa') ?>" class="btn btn-primary w-100">
                            <?= get_lang('dest_explore') ?> <?= get_lang('country_south_africa') ?> <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Angola -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/angola.jpg" class="w-100 h-100" alt="Angola" style="object-fit:cover; transition: transform 0.4s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.7));"></div>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-warning text-dark"><?= get_lang('dest_angola_hidden_gem') ?></span>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h4 class="fw-bold mb-0"><?= get_lang('country_angola') ?></h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('dest_southern_africa') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1"><?= get_lang('dest_angola_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_angola_highlight1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_angola_highlight2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_good_year_round') ?></li>
                        </ul>
                        <a href="<?= get_link('destinations/angola') ?>" class="btn btn-primary w-100">
                            <?= get_lang('dest_explore') ?> <?= get_lang('country_angola') ?> <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Zambia -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/zambia.jpg" class="w-100 h-100" alt="Zambia" style="object-fit:cover; transition: transform 0.4s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.7));"></div>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h4 class="fw-bold mb-0">Zambia</h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i><?= get_lang('dest_southern_africa') ?></small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1"><?= get_lang('dest_zambia_desc') ?></p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_zambia_highlight1') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_zambia_highlight2') ?></li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_best_season') ?> May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/zambia') ?>" class="btn btn-primary w-100">
                            <?= get_lang('dest_explore') ?> Zambia <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Multi-country CTA -->
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-8">
                <div class="p-4 p-lg-5 border rounded-4 h-100 bg-white">
                    <h3 class="fw-bold mb-2"><?= get_lang('dest_plan_trip') ?></h3>
                    <p class="text-muted mb-3"><?= get_lang('dest_plan_trip_desc') ?></p>
                    <ul class="list-inline mb-0 small text-muted">
                        <li class="list-inline-item me-3"><i class="fas fa-check text-success me-1"></i><?= get_lang('dest_tailor_free') ?></li>
                        <li class="list-inline-item me-3"><i class="fas fa-check text-success me-1"></i><?= get_lang('dest_tailor_reply') ?></li>
                        <li class="list-inline-item"><i class="fas fa-check text-success me-1"></i><?= get_lang('dest_tailor_made') ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 p-lg-5 border rounded-4 shadow-sm h-100 d-flex flex-column justify-content-between bg-white">
                    <div>
                        <h4 class="fw-bold mb-2"><?= get_lang('dest_get_quote') ?></h4>
                        <p class="text-muted mb-0"><?= get_lang('dest_get_quote_sub') ?></p>
                    </div>
                    <a href="<?= get_link('index/quote') ?>" class="btn btn-primary mt-4 w-100">
                        <i class="fas fa-paper-plane me-2"></i><?= get_lang('nav_request_quote') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>