<?php /* Packages index */ ?>

<!-- Page Hero -->
<section class="page-hero packages-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg') center/cover no-repeat;">
    <div class="container">
        <div class="text-center text-white">
            <h1 class="display-5 fw-bold mb-2">Tours &amp; Packages</h1>
            <p class="lead mb-3">Ready-made adventures or fully tailor-made — designed around you.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50">Home</a></li>
                    <li class="breadcrumb-item active text-white">Tour Packages</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Category Cards -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Choose Your Style of Travel</h2>
            <p class="text-muted">From romantic escapes to rugged overland adventures — we have a package for every traveller.</p>
        </div>
        <div class="row g-4">

            <!-- Special Offers -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="w-100 h-100" alt="Special Offers" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-danger">Deals</span>
                        <h4 class="position-absolute bottom-0 start-0 p-3 mb-0 text-white fw-bold">Special Offers</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted flex-grow-1">Seasonal specials, short breaks, and value-packed itineraries — perfect for spontaneous travel or tight schedules.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>3–5 day express tours</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Limited-time pricing</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Best for first-timers</li>
                        </ul>
                        <a href="<?= get_link('packages/special_offers') ?>" class="btn btn-primary w-100">View Offers <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Honeymoon -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/pt-namibia.jpg" class="w-100 h-100" alt="Honeymoon" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-danger"><i class="fas fa-heart me-1"></i>Romance</span>
                        <h4 class="position-absolute bottom-0 start-0 p-3 mb-0 text-white fw-bold">Honeymoon</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted flex-grow-1">Romantic, private, and effortless. Designed around comfort, scenery, and memorable moments for two.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Private lodge experiences</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Candle-lit dinners &amp; spa options</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Personalised surprise touches</li>
                        </ul>
                        <a href="<?= get_link('packages/honeymoon') ?>" class="btn btn-primary w-100">View Honeymoon Trips <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Camping & Overland -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/Botswana_Okavango.jpg" class="w-100 h-100" alt="Camping and Overland" style="object-fit:cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.65));"></div>
                        <span class="position-absolute top-0 end-0 m-3 badge bg-success"><i class="fas fa-campground me-1"></i>Adventure</span>
                        <h4 class="position-absolute bottom-0 start-0 p-3 mb-0 text-white fw-bold">Camping &amp; Overland</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted flex-grow-1">Open skies, 4x4 tracks, and national parks. For travellers who love the road and the raw beauty of Southern Africa.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Self-drive &amp; guided routes</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Multi-country loops available</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Gear rental &amp; route planning</li>
                        </ul>
                        <a href="<?= get_link('packages/camping') ?>" class="btn btn-primary w-100">View Camping Trips <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Multi-country Tours -->
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge text-bg-secondary mb-2 px-3 py-2">Multi-Country</span>
            <h2 class="fw-bold">Featured Southern Africa Tours</h2>
            <p class="text-muted">Our most-loved itineraries combining the best of multiple destinations.</p>
        </div>
        <div class="row g-4">

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="img-fluid h-100" alt="Treasure of Southern Africa" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-warning text-dark">Best Seller</span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i>15 Days</small>
                                </div>
                                <h5 class="fw-bold mb-1">The Treasure of Southern Africa</h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i>Namibia · Botswana · Zambia</p>
                                <p class="text-muted small flex-grow-1">Dunes of Namibia, Chobe wildlife, and the majestic Victoria Falls — all in one unforgettable journey.</p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5">From $2,499</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$2,999</small>
                                    </div>
                                    <a class="btn btn-primary package-btn" href="<?= get_link('packages/treasure_southern_africa') ?>">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/Elephants.png" class="img-fluid h-100" alt="Fascinating Southern Africa" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-primary">Premium</span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i>17 Days</small>
                                </div>
                                <h5 class="fw-bold mb-1">Fascinating Southern Africa</h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i>Namibia · Botswana · Zimbabwe</p>
                                <p class="text-muted small flex-grow-1">A comprehensive 17-day adventure linking three iconic countries with wildlife, river cruises, and adventure activities.</p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5">From $3,499</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$4,199</small>
                                    </div>
                                    <a class="btn btn-primary package-btn" href="<?= get_link('packages/fascinating_southern_africa') ?>">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg" class="img-fluid h-100" alt="Namibian Great Outdoors" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-success">Popular</span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i>14 Days</small>
                                </div>
                                <h5 class="fw-bold mb-1">Namibian Great Outdoors</h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i>Namibia</p>
                                <p class="text-muted small flex-grow-1">Etosha, Damaraland, Skeleton Coast, Sossusvlei dunes, and the Kalahari — ideal for small groups.</p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5">From $1,899</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$2,299</small>
                                    </div>
                                    <a class="btn btn-primary package-btn" href="<?= get_link('packages/fascinating_southern_africa') ?>">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="<?= SITE_ADDR ?>assets/images/travel/aerial-view-of-the-okavango-delta-channels-and-landscape.jpg" class="img-fluid h-100" alt="Okavango" style="object-fit:cover; min-height:220px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-info text-dark">Unique</span>
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i>7 Days</small>
                                </div>
                                <h5 class="fw-bold mb-1">A Stroll Around the Okavango</h5>
                                <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt me-1 text-primary"></i>Namibia · Botswana · Zimbabwe</p>
                                <p class="text-muted small flex-grow-1">An immersive safari through the Okavango Delta with wildlife, river landscapes, and iconic natural wonders.</p>
                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fw-bold text-primary fs-5">From $2,799</span>
                                        <small class="text-muted text-decoration-line-through ms-1">$3,399</small>
                                    </div>
                                    <a class="btn btn-primary package-btn" href="<?= get_link('packages/a_stroll_around_okavango') ?>">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tailor-made CTA -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-8">
                <div class="p-4 p-lg-5 border rounded-4 h-100 bg-light">
                    <h3 class="fw-bold mb-2">Prefer a tailor-made trip?</h3>
                    <p class="text-muted mb-3">Tell us your travel dates, budget range, and interests — wildlife, coast, culture, adventure, or family travel. We'll craft a personalised itinerary with clear inclusions, accommodation options, and optional upgrades.</p>
                    <ul class="list-inline mb-0 small text-muted">
                        <li class="list-inline-item me-3"><i class="fas fa-check text-success me-1"></i>Free, no-obligation quote</li>
                        <li class="list-inline-item me-3"><i class="fas fa-check text-success me-1"></i>No hidden fees</li>
                        <li class="list-inline-item"><i class="fas fa-check text-success me-1"></i>Reply within 24 hours</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 p-lg-5 border rounded-4 shadow-sm h-100 d-flex flex-column justify-content-between bg-white">
                    <div>
                        <h4 class="fw-bold mb-2">Request a Free Quote</h4>
                        <p class="text-muted mb-0">We'll reply within 24 hours on business days.</p>
                    </div>
                    <a href="<?= get_link('index/quote') ?>" class="btn btn-primary mt-4 w-100">
                        <i class="fas fa-paper-plane me-2"></i>Request a Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
