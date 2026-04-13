<?php /* Destination: South Africa */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/south-africa.jpg')center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2">South Africa</h1>
        <p class="lead mb-3">The rainbow nation — breathtaking landscapes, iconic wildlife, world-class wine, and vibrant culture.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('destinations/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_destinations') ?></a></li>
                <li class="breadcrumb-item active text-white">South Africa</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Overview -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <span class="badge text-bg-secondary mb-2 px-3 py-2">Southern Africa</span>
                <h2 class="fw-bold mb-3"><?= get_lang('dest_travel_overview') ?></h2>
                <p class="text-muted">South Africa, the rainbow nation nestled at the southern tip of the African continent, is a captivating kaleidoscope of wonders. From breathtaking landscapes and authentic cultural encounters to extraordinary wildlife and flora, South Africa promises an unforgettable journey for adventurous souls seeking unique experiences off the ordinary path.</p>
                <div class="row g-3 mt-2">
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-city text-primary mt-1"></i>
                            <div><strong class="d-block small">Capitals</strong><span class="text-muted small">Pretoria &amp; Cape Town</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-ruler-combined text-primary mt-1"></i>
                            <div><strong class="d-block small">Area</strong><span class="text-muted small">1 221 037 km²</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-language text-primary mt-1"></i>
                            <div><strong class="d-block small">Languages</strong><span class="text-muted small">English + 11 others</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-users text-primary mt-1"></i>
                            <div><strong class="d-block small">Population</strong><span class="text-muted small">60.1 million</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-coins text-primary mt-1"></i>
                            <div><strong class="d-block small">Currency</strong><span class="text-muted small">South African Rand (ZAR)</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-map text-primary mt-1"></i>
                            <div><strong class="d-block small">Provinces</strong><span class="text-muted small">9</span></div>
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
            <h2 class="fw-bold">Must-See Places in South Africa</h2>
            <p class="text-muted">Iconic landscapes, extraordinary wildlife, and world-class experiences.</p>
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
                                    <h5 class="fw-bold mb-0">Table Mountain</h5>
                                </div>
                                <p class="text-muted small mb-2">Cape Town's iconic flat-topped mountain overlooks one of the world's most beautiful cities. Take the cable car for panoramic views, or hike one of several trails to the summit.</p>
                                <p class="text-muted small"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary mt-2">Get a Quote</a>
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
                                    <h5 class="fw-bold mb-0">Kruger National Park</h5>
                                </div>
                                <p class="text-muted small mb-2">One of Africa's largest national parks and a world-class safari destination, home to the Big Five — elephants, lions, leopards, rhinos, and buffalo.</p>
                                <p class="text-muted small"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary mt-2">Get a Quote</a>
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
                                    <h5 class="fw-bold mb-0">The Garden Route</h5>
                                </div>
                                <p class="text-muted small mb-2">This scenic coastal drive along the south coast offers spectacular Indian Ocean views, charming towns, hiking, surfing, and wildlife encounters along the way.</p>
                                <p class="text-muted small"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary mt-2">Get a Quote</a>
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
                                    <h5 class="fw-bold mb-0">Drakensberg Mountains</h5>
                                </div>
                                <p class="text-muted small mb-2">A UNESCO World Heritage Site renowned for spectacular cliffs, verdant valleys, and panoramic views. Exceptional hiking, ancient San rock art, and dramatic escarpments.</p>
                                <p class="text-muted small"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-sm btn-outline-primary mt-2">Get a Quote</a>
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
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p class="text-muted">Planning a trip to South Africa? Here are answers to the most common questions.</p>
        </div>
        <div class="row g-3 justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="saFaq">

                    <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What is the best time to visit South Africa?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#saFaq">
                            <div class="accordion-body text-muted small">South Africa is a year-round destination, but the ideal time depends on your interests. For safaris, the dry winter months (May to September) are best. For beach holidays or the Garden Route, the summer months (November to March) are ideal.</div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do I need a visa to visit South Africa?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#saFaq">
                            <div class="accordion-body text-muted small">Visa requirements depend on your nationality. Many countries including the EU, USA, UK, and SADC enjoy visa-free entry for stays up to 90 days. Check with your nearest South African embassy before travel.</div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What currency is used, and can I pay by card?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#saFaq">
                            <div class="accordion-body text-muted small">The currency is the South African Rand (ZAR). Cards are widely accepted in cities, hotels, and restaurants. It's advisable to carry some cash for rural areas and local markets.</div>
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
        <h3 class="fw-bold mb-3">Plan Your South Africa Journey</h3>
        <p class="text-muted mb-4">Safari, coast, winelands, or all three — we'll craft the perfect South Africa itinerary for you.</p>
        <a href="<?= get_link('index/quote') ?>" class="btn btn-primary px-4">
            <i class="fas fa-paper-plane me-2"></i>Request a Free Quote
        </a>
    </div>
</section>
