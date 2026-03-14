<?php /* Destination: Zambia */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/destinations/zambia.jpg')center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2">Zambia</h1>
        <p class="lead mb-3">Wild, authentic, and unhurried — Zambia is Southern Africa's great untouched safari frontier.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('destinations/index') ?>" class="text-white-50">Destinations</a></li>
                <li class="breadcrumb-item active text-white">Zambia</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="badge text-bg-secondary mb-2 px-3 py-2">Southern Africa</span>
                <h2 class="fw-bold mb-3">Travel Overview</h2>
                <p class="text-muted">Zambia is Southern Africa's best-kept secret — a land of wild, remote national parks, legendary walking safaris, and the thundering Victoria Falls shared with Zimbabwe. From the pristine South Luangwa Valley to the vast Kafue National Park, Zambia offers an intimate, uncrowded safari experience second to none.</p>
                <ul class="list-unstyled mt-3 text-muted">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Victoria Falls (Mosi-oa-Tunya) — shared with Zimbabwe</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>South Luangwa National Park — one of Africa's finest for walking safaris</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Lower Zambezi National Park — canoe safaris along the Zambezi</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Kafue National Park — one of the largest parks in the world</li>
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
        <h3 class="fw-bold mb-3">Explore Zambia With Namwel</h3>
        <p class="text-muted mb-4">Zambia is frequently combined with Zimbabwe and Botswana for epic multi-country itineraries. Request a quote and we'll craft the perfect journey for you.</p>
        <a href="<?= get_link('index/quote') ?>" class="btn btn-primary px-4">
            <i class="fas fa-paper-plane me-2"></i>Request a Free Quote
        </a>
    </div>
</section>
