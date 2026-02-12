<?php /* Packages index */ ?>
<section class="page-title section dark-background">
  <div class="container position-relative" data-aos="fade-up">
    <h1>Tour Packages</h1>
    <p>Choose a ready-made package or request a tailor‑made itinerary based on your dates and interests.</p>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="<?= get_link('index/index') ?>">Home</a></li>
        <li class="current">Tour Packages</li>
      </ol>
    </nav>
  </div>
</section>

<section class="section">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-item position-relative h-100">
          <div class="icon"><i class="bi bi-tags"></i></div>
          <h3>Special Offers</h3>
          <p>Seasonal deals, short breaks, and value-packed trips.</p>
          <a href="<?= get_link('packages/special_offers') ?>" class="readmore stretched-link">View offers <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-item position-relative h-100">
          <div class="icon"><i class="bi bi-heart"></i></div>
          <h3>Honeymoon</h3>
          <p>Romantic lodges and unforgettable moments for two.</p>
          <a href="<?= get_link('packages/honeymoon') ?>" class="readmore stretched-link">View honeymoon trips <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-item position-relative h-100">
          <div class="icon"><i class="bi bi-tent"></i></div>
          <h3>Camping & Overland</h3>
          <p>4x4-friendly routes, national parks, and epic road trips.</p>
          <a href="<?= get_link('packages/camping') ?>" class="readmore stretched-link">View camping trips <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>

    <div class="row gy-4 mt-4">
      <div class="col-lg-8">
        <div class="p-4 border rounded-4 h-100">
          <h3 class="mb-2">Prefer a tailor‑made trip?</h3>
          <p class="mb-0 text-muted">
            Tell us your dates, budget range, and interests (wildlife, coast, culture, adventure, family travel).
            We’ll propose an itinerary with clear inclusions and optional upgrades.
          </p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="p-4 border rounded-4 shadow-sm h-100 d-flex flex-column justify-content-between">
          <div>
            <h4 class="mb-2">Request a Quote</h4>
            <p class="text-muted mb-0">We’ll reply within 24 hours on business days.</p>
          </div>
          <a href="<?= get_link('index/quote') ?>" class="btn btn-primary mt-3">Request a quote</a>
        </div>
      </div>
    </div>

  </div>
</section>
