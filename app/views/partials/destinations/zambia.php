<?php /* Destination: Zambia */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/destinations/zambia.jpg')center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2">Zambia</h1>
        <p class="lead mb-3"><?= get_lang('dest_zambia_subtitle') ?></p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('destinations/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_destinations') ?></a></li>
                <li class="breadcrumb-item active text-white">Zambia</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="badge text-bg-secondary mb-2 px-3 py-2"><?= get_lang('dest_southern_africa') ?></span>
                <h2 class="fw-bold mb-3"><?= get_lang('dest_travel_overview') ?></h2>
                <p class="text-muted"><?= get_lang('dest_zambia_overview') ?></p>
                <ul class="list-unstyled mt-3 text-muted">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_zambia_highlight1') ?></li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_zambia_highlight2') ?></li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_zambia_highlight3') ?></li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i><?= get_lang('dest_zambia_highlight4') ?></li>
                </ul>
            </div>
            <div class="col-lg-5">
                <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/zambia.jpg" class="img-fluid rounded-4 shadow" alt="Zambia">
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-3"><?= get_lang('dest_zambia_cta_title') ?></h3>
        <p class="text-muted mb-4"><?= get_lang('dest_zambia_cta_desc') ?></p>
        <a href="<?= get_link('index/quote') ?>" class="btn btn-primary px-4">
            <i class="fas fa-paper-plane me-2"></i><?= get_lang('dest_request_free_quote') ?>
        </a>
    </div>
</section>