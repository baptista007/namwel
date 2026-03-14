<?php 
$tour = $this->view_data;
?>
<!-- Hero -->
<section class="page-hero position-relative" style="background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.60)), url('<?= SITE_ADDR . $tour['hero_image'] ?>') center/cover no-repeat;">
    <div class="container text-center text-white">
        <div class="mb-3">
            <?php foreach ($tour['countries'] as $c): ?>
                <span class="badge bg-warning text-dark me-1"><?= $c ?></span>
            <?php endforeach; ?>
        </div>
        <h1 class="display-5 fw-bold mb-3"><?= $tour['title'] ?></h1>
        <div class="d-flex flex-wrap justify-content-center gap-4 mb-4 small">
            <span><i class="fas fa-calendar-alt me-1 opacity-75"></i><?= $tour['duration'] ?></span>
            <span><i class="fas fa-users me-1 opacity-75"></i>Max <?= $tour['max_pax'] ?> travellers</span>
            <span><i class="fas fa-user me-1 opacity-75"></i>Min <?= $tour['min_pax'] ?> pax</span>
            <?php if (!empty($tour['price'])): ?>
            <span><i class="fas fa-tag me-1 opacity-75"></i>From <?= $tour['price'] ?></span>
            <?php endif; ?>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= get_link('packages/special_offers') ?>" class="text-white-50">Special Offers</a></li>
                <li class="breadcrumb-item active text-white"><?= $tour['title'] ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Sticky Tab Nav -->
<div class="bg-white border-bottom shadow-sm sticky-top" style="top:0;z-index:100;">
    <div class="container">
        <ul class="nav nav-tabs border-0 flex-nowrap" id="tourTabs">
            <li class="nav-item">
                <a class="nav-link px-3 py-3 fw-semibold active" href="#overview" data-tab="overview">
                    <i class="fas fa-binoculars me-1"></i>Overview
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 py-3 fw-semibold" href="#cost" data-tab="cost">
                    <i class="fas fa-dollar-sign me-1"></i>Cost Info
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 py-3 fw-semibold" href="#itinerary" data-tab="itinerary">
                    <i class="fas fa-map-marked-alt me-1"></i>Itinerary
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 py-3 fw-semibold" href="#map" data-tab="map">
                    <i class="fas fa-map me-1"></i>Map
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 py-3 fw-semibold" href="#faq" data-tab="faq">
                    <i class="fas fa-question-circle me-1"></i>FAQ
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Tab Content -->
<div class="container py-5">
    <div class="row g-5">

        <!-- Left: Main Content -->
        <div class="col-lg-8">

            <!-- Overview -->
            <section id="overview" class="tour-section mb-5">
                <h2 class="fw-bold mb-3 border-start border-4 border-warning ps-3">Overview</h2>
                <?php foreach ($tour['overview'] as $para): ?>
                    <p class="text-muted"><?= $para ?></p>
                <?php endforeach; ?>
            </section>

            <!-- Cost Info -->
            <section id="cost" class="tour-section mb-5">
                <h2 class="fw-bold mb-4 border-start border-4 border-warning ps-3">Cost Information</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded-3 h-100" style="background:#f0faf0;border:1px solid #c3e6cb;">
                            <h5 class="fw-bold text-success mb-3"><i class="fas fa-check-circle me-2"></i>Price Includes</h5>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($tour['includes'] as $item): ?>
                                    <li class="mb-2 small"><i class="fas fa-check text-success me-2"></i><?= $item ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-3 h-100" style="background:#fff5f5;border:1px solid #f5c6cb;">
                            <h5 class="fw-bold text-danger mb-3"><i class="fas fa-times-circle me-2"></i>Price Excludes</h5>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($tour['excludes'] as $item): ?>
                                    <li class="mb-2 small"><i class="fas fa-times text-danger me-2"></i><?= $item ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Itinerary -->
            <section id="itinerary" class="tour-section mb-5">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="fw-bold mb-0 border-start border-4 border-warning ps-3">Itinerary</h2>
                    <button class="btn btn-sm btn-outline-secondary" id="expandAllBtn" onclick="toggleAll()">Expand All</button>
                </div>
                <div class="accordion" id="itineraryAccordion">
                    <?php foreach ($tour['itinerary'] as $i => $day): ?>
                    <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?> fw-semibold py-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#day<?= $i ?>" aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>">
                                <span class="badge bg-warning text-dark me-3" style="min-width:70px;">Day <?= $day['day'] ?></span>
                                <?= $day['title'] ?>
                            </button>
                        </h2>
                        <div id="day<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" data-bs-parent="">
                            <div class="accordion-body pt-2 pb-3">
                                <?php if (!empty($day['route'])): ?>
                                    <p class="small text-muted mb-2"><i class="fas fa-route me-1 text-warning"></i><strong>Route:</strong> <?= $day['route'] ?></p>
                                <?php endif; ?>
                                <p class="mb-2"><?= $day['description'] ?></p>
                                <?php if (!empty($day['accommodation'])): ?>
                                    <p class="small mb-0"><i class="fas fa-bed me-1 text-warning"></i><strong>Accommodation:</strong> <?= $day['accommodation'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Map -->
            <section id="map" class="tour-section mb-5">
                <h2 class="fw-bold mb-4 border-start border-4 border-warning ps-3">Route Map</h2>
                <div class="rounded-3 overflow-hidden border">
                    <?php if (!empty($tour['map_embed'])): ?>
                        <?= $tour['map_embed'] ?>
                    <?php else: ?>
                        <div class="bg-light d-flex align-items-center justify-content-center flex-column py-5 text-muted">
                            <i class="fas fa-map-marked-alt fa-3x mb-3 opacity-50"></i>
                            <p class="mb-3">Interactive route map — <?= implode(' → ', $tour['map_stops']) ?></p>
                            <a href="<?= get_link('index/quote') ?>" class="btn btn-primary btn-sm">Request Full Itinerary</a>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <!-- FAQ -->
            <section id="faq" class="tour-section mb-5">
                <h2 class="fw-bold mb-4 border-start border-4 border-warning ps-3">Frequently Asked Questions</h2>
                <div class="accordion" id="faqAccordion">
                    <?php foreach ($tour['faq'] as $fi => $fitem): ?>
                    <div class="accordion-item border-0 mb-2 rounded-3 overflow-hidden shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq<?= $fi ?>">
                                <?= $fitem['q'] ?>
                            </button>
                        </h2>
                        <div id="faq<?= $fi ?>" class="accordion-collapse collapse" data-bs-parent="">
                            <div class="accordion-body text-muted"><?= $fitem['a'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

        </div><!-- /col-lg-8 -->

        <!-- Right: Sidebar -->
        <div class="col-lg-4">
            <div class="" style="top:80px;">

                <!-- Quick Facts -->
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-warning text-dark fw-bold rounded-top-3 border-0">
                        <i class="fas fa-info-circle me-2"></i>Quick Facts
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-bottom-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted small">Duration</span>
                                <span class="fw-semibold small"><?= $tour['duration'] ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted small">Countries</span>
                                <span class="fw-semibold small"><?= implode(', ', $tour['countries']) ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted small">Max Travellers</span>
                                <span class="fw-semibold small"><?= $tour['max_pax'] ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted small">Min Pax</span>
                                <span class="fw-semibold small"><?= $tour['min_pax'] ?></span>
                            </li>
                            <?php if (!empty($tour['price'])): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted small">Starting From</span>
                                <span class="fw-bold text-primary small"><?= $tour['price'] ?></span>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <!-- CTA -->
                <div class="card border-0 shadow-sm rounded-3 mb-4" style="background:linear-gradient(135deg,#1a3a2a,#2d6a4f);">
                    <div class="card-body p-4 text-white text-center">
                        <i class="fas fa-paper-plane fa-2x mb-3 opacity-75"></i>
                        <h5 class="fw-bold mb-2">Book This Tour</h5>
                        <p class="small opacity-75 mb-3">Get a personalised quote within 24 hours. No commitment required.</p>
                        <a href="<?= get_link('index/quote') ?>" class="btn btn-warning w-100 fw-bold mb-2">
                            Request a Free Quote
                        </a>
                        <a href="tel:+26461244697" class="btn btn-outline-light w-100 btn-sm">
                            <i class="fas fa-phone me-1"></i>+264 61 244 697
                        </a>
                    </div>
                </div>

                <!-- Highlights -->
                <?php if (!empty($tour['highlights'])): ?>
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-light fw-bold border-0">
                        <i class="fas fa-star text-warning me-2"></i>Tour Highlights
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <?php foreach ($tour['highlights'] as $h): ?>
                                <li class="mb-2 small"><i class="fas fa-check-circle text-success me-2"></i><?= $h ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div><!-- /col-lg-4 -->

    </div>
</div>

<!-- Smooth scroll + tab highlight JS -->
<script>
(function(){
    // Tab highlighting on scroll
    const sections = document.querySelectorAll('.tour-section');
    const tabLinks = document.querySelectorAll('[data-tab]');
    const observer = new IntersectionObserver((entries)=>{
        entries.forEach(e=>{
            if(e.isIntersecting){
                tabLinks.forEach(l=>l.classList.remove('active'));
                const active = document.querySelector('[data-tab="'+e.target.id+'"]');
                if(active) active.classList.add('active');
            }
        });
    },{rootMargin:'-30% 0px -60% 0px'});
    sections.forEach(s=>observer.observe(s));

    // Smooth scroll on tab click
    tabLinks.forEach(l=>{
        l.addEventListener('click',function(e){
            e.preventDefault();
            const target = document.getElementById(this.getAttribute('data-tab'));
            if(target) target.scrollIntoView({behavior:'smooth',block:'start'});
        });
    });
})();

let allExpanded = false;
function toggleAll(){
    allExpanded = !allExpanded;
    document.querySelectorAll('#itineraryAccordion .accordion-collapse').forEach(c=>{
        const bsCollapse = bootstrap.Collapse.getOrCreateInstance(c, {toggle:false});
        allExpanded ? bsCollapse.show() : bsCollapse.hide();
    });
    document.getElementById('expandAllBtn').textContent = allExpanded ? 'Collapse All' : 'Expand All';
}
</script>
