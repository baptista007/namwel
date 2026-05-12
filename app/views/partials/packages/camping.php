<?php /* Package category: Camping & Overland — content from namwel.com.na/camping/ */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/destinations/Botswana_Okavango.jpg') center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2"><?= get_lang('pkgs_camping_page_title') ?></h1>
        <p class="lead mb-3"><?= get_lang('pkgs_camping_page_subtitle') ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('packages/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_packages') ?></a></li>
                <li class="breadcrumb-item active text-white notranslate"><?= get_lang('pkgs_camping_page_title') ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- What to Expect -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="badge text-bg-success mb-2 px-3 py-2"><i class="fas fa-campground me-1"></i><?= get_lang('pkgs_badge_adventure') ?></span>
                <h2 class="fw-bold mb-3"><?= get_lang('pkgs_camping_section_title') ?></h2>
                <p class="text-muted"><?= get_lang('pkgs_camping_intro_1') ?></p>
                <p class="text-muted"><?= get_lang('pkgs_camping_intro_2') ?></p>
                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-truck-pickup text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('pkgs_camping_feat1_title') ?></strong><span class="text-muted small"><?= get_lang('pkgs_camping_feat1_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-star text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('pkgs_camping_feat2_title') ?></strong><span class="text-muted small"><?= get_lang('pkgs_camping_feat2_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-tools text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('pkgs_camping_feat3_title') ?></strong><span class="text-muted small"><?= get_lang('pkgs_camping_feat3_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-utensils text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('pkgs_camping_feat4_title') ?></strong><span class="text-muted small"><?= get_lang('pkgs_camping_feat4_sub') ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/Botswana_Okavango.jpg" class="img-fluid rounded-4 shadow" alt="Camping Overland Namibia">
            </div>
        </div>
    </div>
</section>

<!-- Camp Highlights -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('pkgs_camping_destinations_title') ?></h2>
            <p class="text-muted"><?= get_lang('pkgs_camping_destinations_desc') ?></p>
        </div>
        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width:48px;height:48px;">
                                <i class="fas fa-campground text-primary"></i>
                            </div>
                            <h5 class="fw-bold mb-0"><?= get_lang('pkgs_camping_place1_title') ?></h5>
                        </div>
                        <p class="text-muted small mb-0"><?= get_lang('pkgs_camping_place1_desc') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width:48px;height:48px;">
                                <i class="fas fa-tree text-success"></i>
                            </div>
                            <h5 class="fw-bold mb-0"><?= get_lang('pkgs_camping_place2_title') ?></h5>
                        </div>
                        <p class="text-muted small mb-0"><?= get_lang('pkgs_camping_place2_desc') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width:48px;height:48px;">
                                <i class="fas fa-mountain text-warning"></i>
                            </div>
                            <h5 class="fw-bold mb-0"><?= get_lang('pkgs_camping_place3_title') ?></h5>
                        </div>
                        <p class="text-muted small mb-0"><?= get_lang('pkgs_camping_place3_desc') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width:48px;height:48px;">
                                <i class="fas fa-moon text-info"></i>
                            </div>
                            <h5 class="fw-bold mb-0"><?= get_lang('pkgs_camping_place4_title') ?></h5>
                        </div>
                        <p class="text-muted small mb-0"><?= get_lang('pkgs_camping_place4_desc') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width:48px;height:48px;">
                                <i class="fas fa-water text-primary"></i>
                            </div>
                            <h5 class="fw-bold mb-0"><?= get_lang('pkgs_camping_place5_title') ?></h5>
                        </div>
                        <p class="text-muted small mb-0"><?= get_lang('pkgs_camping_place5_desc') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width:48px;height:48px;">
                                <i class="fas fa-road text-danger"></i>
                            </div>
                            <h5 class="fw-bold mb-0"><?= get_lang('pkgs_camping_place6_title') ?></h5>
                        </div>
                        <p class="text-muted small mb-0"><?= get_lang('pkgs_camping_place6_desc') ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Sample Itineraries -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold"><?= get_lang('pkgs_camping_itineraries_title') ?></h2>
            <p class="text-muted"><?= get_lang('pkgs_camping_itineraries_desc') ?></p>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <h6 class="fw-bold"><i class="fas fa-route text-primary me-2"></i><?= get_lang('pkgs_camping_itin1_title') ?></h6>
                    <p class="text-muted small mb-3"><?= get_lang('pkgs_camping_itin1_desc') ?></p>
                    <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary"><?= get_lang('pkgs_view_itinerary') ?></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <h6 class="fw-bold"><i class="fas fa-route text-primary me-2"></i><?= get_lang('pkgs_camping_itin2_title') ?></h6>
                    <p class="text-muted small mb-3"><?= get_lang('pkgs_camping_itin2_desc') ?></p>
                    <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary"><?= get_lang('pkgs_view_itinerary') ?></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <h6 class="fw-bold"><i class="fas fa-route text-primary me-2"></i><?= get_lang('pkgs_camping_itin3_title') ?></h6>
                    <p class="text-muted small mb-3"><?= get_lang('pkgs_camping_itin3_desc') ?></p>
                    <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary"><?= get_lang('pkgs_view_itinerary') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Good to know + CTA -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3"><?= get_lang('pkgs_good_to_know_title') ?></h3>
                <ul class="text-muted mb-0">
                    <li class="mb-2"><?= get_lang('pkgs_camping_good_know_1') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_camping_good_know_2') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_camping_good_know_3') ?></li>
                    <li class="mb-2"><?= get_lang('pkgs_camping_good_know_4') ?></li>
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