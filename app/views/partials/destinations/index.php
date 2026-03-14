<?php /* Destinations index */ ?>

<!-- Page Hero -->
<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/Elephants.png')center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2">Destinations</h1>
        <p class="lead mb-3">Explore Southern Africa's most remarkable countries — or combine them into a seamless multi-country adventure.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white">Destinations</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Destination Cards -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Where Do You Want to Go?</h2>
            <p class="text-muted">Each destination has its own character — from Namibia's red dunes to Botswana's waterways and Zimbabwe's thundering falls. We know them all intimately.</p>
        </div>
        <div class="row g-4">

            <!-- Namibia -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/pt-namibia.jpg" class="w-100 h-100" alt="Namibia" style="object-fit:cover; transition: transform 0.4s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(to bottom,transparent 40%,rgba(0,0,0,0.7));"></div>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h4 class="fw-bold mb-0">Namibia</h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i>Southern Africa</small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1">Desert dunes, open skies, abundant wildlife, and dramatic coastlines. Namibia is one of the world's last great wildernesses — ideal for self-drive and guided safaris alike.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Sossusvlei &amp; Etosha National Park</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Skeleton Coast &amp; Damaraland</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Best season: May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/namibia') ?>" class="btn btn-primary w-100">
                            Explore Namibia <i class="fas fa-arrow-right ms-1"></i>
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
                            <h4 class="fw-bold mb-0">Botswana</h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i>Southern Africa</small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1">Africa's finest safari destination — remote, pristine, and teeming with wildlife. The Okavango Delta and Chobe National Park rank among the world's greatest natural wonders.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Okavango Delta &amp; Chobe NP</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Kgalagadi Transfrontier Park</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Best season: May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/botswana') ?>" class="btn btn-primary w-100">
                            Explore Botswana <i class="fas fa-arrow-right ms-1"></i>
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
                            <h4 class="fw-bold mb-0">Zimbabwe</h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i>Southern Africa</small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1">Victoria Falls, ancient ruins, extraordinary wildlife, and a warm-hearted culture. Zimbabwe is a rising destination offering world-class experiences without the crowds.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Victoria Falls &amp; Hwange NP</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Matobo Hills &amp; Mana Pools</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Best season: May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/zimbabwe') ?>" class="btn btn-primary w-100">
                            Explore Zimbabwe <i class="fas fa-arrow-right ms-1"></i>
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
                            <h4 class="fw-bold mb-0">South Africa</h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i>Southern Africa</small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1">A country of extraordinary contrasts — iconic wildlife, world-class winelands, dramatic coastlines, and the cosmopolitan energy of Cape Town and Johannesburg.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Kruger NP &amp; Table Mountain</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Garden Route &amp; Drakensberg</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Best season: May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/south_africa') ?>" class="btn btn-primary w-100">
                            Explore South Africa <i class="fas fa-arrow-right ms-1"></i>
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
                        <span class="position-absolute top-0 end-0 m-3 badge bg-warning text-dark">Hidden Gem</span>
                        <div class="position-absolute bottom-0 start-0 p-3 text-white">
                            <h4 class="fw-bold mb-0">Angola</h4>
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i>Southern Africa</small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1">A captivating destination off the beaten track — breathtaking landscapes, Atlantic beaches, spectacular waterfalls, and a rich culture waiting to be discovered.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Kalandula Falls &amp; Kissama NP</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Luanda, Benguela &amp; Lobito coast</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Good year-round</li>
                        </ul>
                        <a href="<?= get_link('destinations/angola') ?>" class="btn btn-primary w-100">
                            Explore Angola <i class="fas fa-arrow-right ms-1"></i>
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
                            <small class="opacity-75"><i class="fas fa-map-marker-alt me-1"></i>Southern Africa</small>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <p class="text-muted flex-grow-1">Southern Africa's best-kept secret — wild, authentic, and uncrowded. Famous for legendary walking safaris in South Luangwa and the Zambian side of Victoria Falls.</p>
                        <ul class="list-unstyled small mb-3">
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>South Luangwa &amp; Lower Zambezi</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Victoria Falls &amp; Kafue NP</li>
                            <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i>Best season: May – October</li>
                        </ul>
                        <a href="<?= get_link('destinations/zambia') ?>" class="btn btn-primary w-100">
                            Explore Zambia <i class="fas fa-arrow-right ms-1"></i>
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
                    <h3 class="fw-bold mb-2">Prefer a multi-country route?</h3>
                    <p class="text-muted mb-3">The best Southern Africa itineraries combine two or three countries in one seamless journey. Namibia + Botswana + Zimbabwe is our most-loved combination — but the possibilities are endless. Tell us your interests and we'll design a route around you.</p>
                    <ul class="list-inline mb-0 small text-muted">
                        <li class="list-inline-item me-3"><i class="fas fa-check text-success me-1"></i>Free, no-obligation quote</li>
                        <li class="list-inline-item me-3"><i class="fas fa-check text-success me-1"></i>Reply within 24 hours</li>
                        <li class="list-inline-item"><i class="fas fa-check text-success me-1"></i>Fully tailor-made</li>
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
