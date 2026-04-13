<?php /* Destination: Zimbabwe (mapped to zambia.php – see DestinationsController) */ ?>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)), url('<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg')center/cover no-repeat;">
    <div class="container text-center text-white">
        <h1 class="display-5 fw-bold mb-2">Zimbabwe</h1>
        <p class="lead mb-3">Victoria Falls, ancient ruins, extraordinary wildlife, and an emerging adventure destination in the heart of Southern Africa.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('destinations/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_destinations') ?></a></li>
                <li class="breadcrumb-item active text-white">Zimbabwe</li>
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
                <p class="text-muted">Zimbabwe, nestled in the heart of Southern Africa, is a captivating destination inviting travellers in search of authentic adventures. The country boasts breathtaking scenery, rich and diverse wildlife, and exceptional cultural and historical sites. Beyond its natural wonders, Zimbabwe has a rich heritage — from the ruins of Great Zimbabwe to the San rock art, and the colonial cities of Bulawayo and Harare.</p>
                <div class="row g-3 mt-2">
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-city text-primary mt-1"></i>
                            <div><strong class="d-block small">Capital</strong><span class="text-muted small">Harare</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-ruler-combined text-primary mt-1"></i>
                            <div><strong class="d-block small">Area</strong><span class="text-muted small">390 580 km²</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-language text-primary mt-1"></i>
                            <div><strong class="d-block small">Languages</strong><span class="text-muted small">English, Shona, Ndebele</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-users text-primary mt-1"></i>
                            <div><strong class="d-block small">Population</strong><span class="text-muted small">14.5 million</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-coins text-primary mt-1"></i>
                            <div><strong class="d-block small">Currency</strong><span class="text-muted small">ZiG (Zimbabwe Gold)</span></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="fas fa-map text-primary mt-1"></i>
                            <div><strong class="d-block small">Provinces</strong><span class="text-muted small">10</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" class="img-fluid rounded-4 shadow" alt="Victoria Falls Zimbabwe">
            </div>
        </div>
    </div>
</section>

<!-- Must-See Places -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Must-See Places in Zimbabwe</h2>
            <p class="text-muted">Stunning scenery, extraordinary wildlife, and outdoor adventures await across this remarkable country.</p>
        </div>
        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/nike159-victoria-falls-2042641_640.jpg" class="card-img-top" alt="Victoria Falls" style="height:200px; object-fit:cover;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0">Victoria Falls</h5>
                            <span class="badge bg-info text-dark small">Ask us</span>
                        </div>
                        <p class="text-muted small mb-2">Known as Mosi-oa-Tunya — "the smoke that thunders" — on the Zambezi River at the Zambia-Zimbabwe border. One of the seven natural wonders of the world and Africa's most iconic sight.</p>
                        <p class="text-muted small mb-3"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/Elephants.png" class="card-img-top" alt="Hwange National Park" style="height:200px; object-fit:cover;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0">Hwange National Park</h5>
                            <span class="badge bg-info text-dark small">Ask us</span>
                        </div>
                        <p class="text-muted small mb-2">One of Africa's largest national parks and Zimbabwe's most popular safari destination. Spanning over 14,600 km², it is home to some of the highest elephant populations on the continent.</p>
                        <p class="text-muted small mb-3"><i class="fas fa-calendar text-primary me-1"></i><?= get_lang('dest_best_season') ?> May – October</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/destinations/zambia.jpg" class="card-img-top" alt="Matobo Hills" style="height:200px; object-fit:cover;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0">Matobo Hills</h5>
                            <span class="badge bg-info text-dark small">Ask us</span>
                        </div>
                        <p class="text-muted small mb-2">A UNESCO World Heritage Site with ancient San rock paintings, dramatic granite kopjes, and white rhino tracking. A profoundly spiritual and historically significant landscape.</p>
                        <p class="text-muted small mb-3"><i class="fas fa-calendar text-primary me-1"></i>Good year-round</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><i class="fas fa-monument text-primary me-2"></i>Great Zimbabwe Ruins</h5>
                        <p class="text-muted small mb-0">The ancient stone city that gives the country its name. These remarkable 11th-century ruins are the largest stone structure in sub-Saharan Africa and a powerful symbol of pre-colonial civilisation.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><i class="fas fa-ship text-primary me-2"></i>Zambezi River &amp; Lake Kariba</h5>
                        <p class="text-muted small mb-0">Sunset cruises on the Zambezi, tiger fishing on Lake Kariba, and houseboat safaris on one of the world's largest man-made lakes — a completely different side of Zimbabwe's wildlife.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><i class="fas fa-binoculars text-primary me-2"></i>Mana Pools National Park</h5>
                        <p class="text-muted small mb-0">A UNESCO World Heritage Site on the Zambezi floodplain — known for walking safaris with extraordinary close wildlife encounters. One of Africa's true wild gems, accessible May to October.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h3 class="fw-bold mb-3">Plan Your Zimbabwe Adventure</h3>
        <p class="text-muted mb-4">Zimbabwe is often combined with Botswana or Zambia for an epic multi-country itinerary. Let us design your perfect trip.</p>
        <a href="<?= get_link('index/quote') ?>" class="btn btn-primary px-4">
            <i class="fas fa-paper-plane me-2"></i>Request a Free Quote
        </a>
    </div>
</section>
