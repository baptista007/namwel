<?php /* About Us — content from namwel.com.na/a-propos-de-nous/ */ ?>
<!-- Who We Are -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <span class="badge text-bg-secondary mb-2 px-3 py-2 notranslate"><?= get_lang('about_badge') ?></span>
                <h2 class="fw-bold mb-3"><?= get_lang('about_who_title') ?></h2>
                <p class="text-muted"><?= get_lang('about_intro_1') ?></p>
                <p class="text-muted"><?= get_lang('about_intro_2') ?></p>
                <div class="row g-3 mt-2">
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-award text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('about_licensed') ?></strong><span class="text-muted small"><?= get_lang('about_licensed_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-language text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('about_multilingual') ?></strong><span class="text-muted small"><?= get_lang('about_multilingual_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-map-marked-alt text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('about_local') ?></strong><span class="text-muted small"><?= get_lang('about_local_sub') ?></span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-users text-primary mt-1"></i>
                            <div><strong class="d-block small"><?= get_lang('about_groups') ?></strong><span class="text-muted small"><?= get_lang('about_groups_sub') ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg" class="img-fluid rounded-4 shadow" alt="Namwel Tours Namibia">
            </div>
        </div>
    </div>
</section>

<!-- Vision, Mission, Values -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('about_drives_title') ?></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-3" style="width:64px;height:64px;">
                        <i class="fas fa-eye text-primary fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-2"><?= get_lang('about_vision_title') ?></h5>
                    <p class="text-muted small mb-0"><?= get_lang('about_vision_desc') ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-3" style="width:64px;height:64px;">
                        <i class="fas fa-handshake text-success fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-2"><?= get_lang('about_mission_title') ?></h5>
                    <p class="text-muted small mb-0"><?= get_lang('about_mission_desc') ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-3" style="width:64px;height:64px;">
                        <i class="fas fa-leaf text-warning fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-2"><?= get_lang('about_values_title') ?></h5>
                    <p class="text-muted small mb-0"><?= get_lang('about_values_desc') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <img src="<?= SITE_ADDR ?>assets/images/great-south-01.jpeg" class="img-fluid rounded-4 shadow" alt="Why Choose Namwel">
            </div>
            <div class="col-lg-7">
                <h2 class="fw-bold mb-3"><?= get_lang('about_why_title') ?></h2>
                <p class="text-muted mb-4"><?= get_lang('about_why_desc') ?></p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:40px;height:40px;">
                                <i class="fas fa-check text-primary small"></i>
                            </div>
                            <div>
                                <strong class="d-block small"><?= get_lang('about_legal') ?></strong>
                                <span class="text-muted small"><?= get_lang('about_legal_sub') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:40px;height:40px;">
                                <i class="fas fa-check text-primary small"></i>
                            </div>
                            <div>
                                <strong class="d-block small"><?= get_lang('about_tailor') ?></strong>
                                <span class="text-muted small"><?= get_lang('about_tailor_sub') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:40px;height:40px;">
                                <i class="fas fa-check text-primary small"></i>
                            </div>
                            <div>
                                <strong class="d-block small"><?= get_lang('about_knowledge') ?></strong>
                                <span class="text-muted small"><?= get_lang('about_knowledge_sub') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:40px;height:40px;">
                                <i class="fas fa-check text-primary small"></i>
                            </div>
                            <div>
                                <strong class="d-block small"><?= get_lang('about_support') ?></strong>
                                <span class="text-muted small"><?= get_lang('about_support_sub') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Book -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('about_book_title') ?></h2>
            <p class="text-muted"><?= get_lang('about_book_desc') ?></p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3 fw-bold fs-4" style="width:64px;height:64px;">1</div>
                    <h5 class="fw-bold"><?= get_lang('about_book1') ?></h5>
                    <p class="text-muted small"><?= get_lang('about_book1_desc') ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3 fw-bold fs-4" style="width:64px;height:64px;">2</div>
                    <h5 class="fw-bold"><?= get_lang('about_book2') ?></h5>
                    <p class="text-muted small"><?= get_lang('about_book2_desc') ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3 fw-bold fs-4" style="width:64px;height:64px;">3</div>
                    <h5 class="fw-bold"><?= get_lang('about_book3') ?></h5>
                    <p class="text-muted small"><?= get_lang('about_book3_desc') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community Empowerment -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('about_community_title') ?></h2>
            <p class="text-muted"><?= get_lang('about_community_desc') ?></p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="mb-3"><i class="fas fa-globe-africa text-primary fs-3"></i></div>
                    <h5 class="fw-bold"><?= get_lang('about_comm1_title') ?></h5>
                    <p class="text-muted small mb-0"><?= get_lang('about_comm1_desc') ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="mb-3"><i class="fas fa-briefcase text-success fs-3"></i></div>
                    <h5 class="fw-bold"><?= get_lang('about_comm2_title') ?></h5>
                    <p class="text-muted small mb-0"><?= get_lang('about_comm2_desc') ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="mb-3"><i class="fas fa-store text-warning fs-3"></i></div>
                    <h5 class="fw-bold"><?= get_lang('about_comm3_title') ?></h5>
                    <p class="text-muted small mb-0"><?= get_lang('about_comm3_desc') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"><?= get_lang('about_team_title') ?></h2>
            <p class="text-muted"><?= get_lang('about_team_desc') ?></p>
        </div>
        <div class="row g-4">

            <!-- CEO -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <img src="<?= SITE_ADDR ?>assets/images/managing_driector-1024x698-1.jpg" class="card-img-top" alt="Fernando Celestino" style="height:220px; object-fit:contain;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-1">Fernando Celestino</h5>
                        <p class="text-primary small mb-1"><?= get_lang('about_ceo_languages') ?></p>
                        <p class="text-primary small mb-2"><?= get_lang('about_ceo_title') ?></p>
                        <p class="text-muted small mb-0"><?= get_lang('about_ceo_desc') ?></p>
                    </div>
                </div>
            </div>

            <!-- Drivers -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="mb-3">
                        <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center" style="width:56px;height:56px;">
                            <i class="fas fa-car text-primary fs-4"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1"><?= get_lang('about_drivers_title') ?></h5>
                    <p class="text-muted small mb-4"><?= get_lang('about_drivers_desc') ?></p>
                    <img src="<?= SITE_ADDR ?>assets/images/tropic-of-capricorn-02.jpeg" class="card-img-top" alt="Professional Drivers">
                </div>
            </div>

            <!-- Guides -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="mb-3">
                        <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center" style="width:56px;height:56px;">
                            <i class="fas fa-binoculars text-success fs-4"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1"><?= get_lang('about_guides_title') ?></h5>
                    <p class="text-muted small mb-4"><?= get_lang('about_guides_desc') ?></p>
                    <img src="<?= SITE_ADDR ?>assets/images/Destination-Specialists.jpeg" class="card-img-top" alt="Destination Specialists">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h3 class="fw-bold mb-3"><?= get_lang('about_cta_title') ?></h3>
        <p class="text-muted mb-4"><?= get_lang('about_cta_desc') ?></p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="<?= get_link('index/quote') ?>" class="btn btn-primary px-4">
                <i class="fas fa-paper-plane me-2"></i><?= get_lang('about_cta_quote') ?>
            </a>
            <a href="<?= get_link('index/contact') ?>" class="btn btn-outline-secondary px-4">
                <i class="fas fa-envelope me-2"></i><?= get_lang('about_cta_contact') ?>
            </a>
        </div>
    </div>
</section>
