<?php /* Package category: Special Offers — content from namwel.com.na/nos-offres-speciales/ */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg') center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2"><?= get_lang('pkgs_special_page_title') ?></h1>
        <p class="lead mb-3"><?= get_lang('pkgs_special_page_subtitle') ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('packages/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_packages') ?></a></li>
                <li class="breadcrumb-item active text-white notranslate"><?= get_lang('pkgs_special_page_title') ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Featured Tours -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge text-bg-danger mb-2 px-3 py-2"><?= get_lang('pkgs_current_offers_badge') ?></span>
            <h2 class="fw-bold"><?= get_lang('pkgs_safari_circuits_title') ?></h2>
            <p class="text-muted"><?= get_lang('pkgs_safari_circuits_desc') ?></p>
        </div>
        <div class="row g-4">

            <!-- Namibia Great Spaces -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg" class="img-fluid h-100" alt="The Great Spaces of Namibia" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-primary"><?= get_lang('pkgs_badge_namibia') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_great_spaces_duration') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_great_spaces_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_great_spaces_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_great_spaces_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_on_request') ?></span>
                                        <small class="text-muted d-block"><?= get_lang('pkgs_per_person') ?></small>
                                    </div>
                                    <a href="<?= get_link('packages/great_spaces_namibia') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_view_tour') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fascinating Southern Africa -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/Elephants.png" class="img-fluid h-100" alt="Fascinating Southern Africa" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-warning text-dark"><?= get_lang('pkgs_badge_multi_country') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_fascinating_sa_duration') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_fascinating_sa_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_fascinating_sa_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_fascinating_sa_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_on_request') ?></span>
                                        <small class="text-muted d-block"><?= get_lang('pkgs_per_person') ?></small>
                                    </div>
                                    <a href="<?= get_link('packages/fascinating_southern_africa') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_view_tour') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Treasure of Southern Africa -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="img-fluid h-100" alt="Treasure of Southern Africa" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-success"><?= get_lang('pkgs_badge_best_seller') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_treasure_duration') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_treasure_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_treasure_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_treasure_desc_short') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_from') ?> $2,499</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$2,999</small>
                                    </div>
                                    <a href="<?= get_link('packages/treasure_southern_africa') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_view_tour') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unforgettable Adventure -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/aerial-view-of-the-okavango-delta-channels-and-landscape.jpg" class="img-fluid h-100" alt="Unforgettable Adventure" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-info text-dark"><?= get_lang('pkgs_badge_epic') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_unforgettable_duration') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_unforgettable_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_fascinating_sa_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_unforgettable_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_on_request') ?></span>
                                        <small class="text-muted d-block"><?= get_lang('pkgs_per_person') ?></small>
                                    </div>
                                    <a href="<?= get_link('packages/unforgettable_adventure') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_view_tour') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fascinating Namibia Grand South -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/namibia-south.jpg" class="img-fluid h-100" alt="Namibia Grand South" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-primary"><?= get_lang('pkgs_badge_namibia') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_grand_south_duration') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_grand_south_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_great_spaces_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_grand_south_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_on_request') ?></span>
                                        <small class="text-muted d-block"><?= get_lang('pkgs_per_person') ?></small>
                                    </div>
                                    <a href="<?= get_link('packages/great_south_namibia') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_view_tour') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Southern Africa Escape -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/south-africa.jpeg" class="img-fluid h-100" alt="Southern Africa Escape" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-danger"><?= get_lang('pkgs_badge_premium') ?></span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i><?= get_lang('pkgs_escape_duration') ?></small>
                                </div>
                                <h5 class="fw-bold mb-1"><?= get_lang('pkgs_escape_title') ?></h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i><?= get_lang('pkgs_fascinating_sa_route') ?></p>
                                <p class="text-muted small flex-grow-1"><?= get_lang('pkgs_escape_desc') ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5"><?= get_lang('pkgs_from') ?> €2,815</span>
                                        <small class="text-muted d-block"><?= get_lang('pkgs_per_person') ?></small>
                                    </div>
                                    <a href="<?= get_link('packages/southern_africa_escape') ?>" class="btn btn-sm btn-primary"><?= get_lang('pkgs_view_tour') ?></a>
                                </div>
                            </div>
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
                    <li class="mb-2"><?= get_lang('pkgs_good_to_know_1') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_good_to_know_2') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_good_to_know_3') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_good_to_know_4') ?></li>
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