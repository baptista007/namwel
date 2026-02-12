<?php
// Contact page (public)
// Form POST is handled by InfoController::contact()
?>
<section class="page-title section dark-background">
  <div class="container position-relative" data-aos="fade-up">
    <h1>Contact</h1>
    <p>Tell us what you want to see — we’ll design your itinerary and send a clear quotation.</p>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="<?= get_link('index/index') ?>">Home</a></li>
        <li class="current">Contact</li>
      </ol>
    </nav>
  </div>
</section>

<section class="section" id="quote">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="p-4 border rounded-4 shadow-sm">
          <?php $this::display_page_errors(); ?>

          <h3 class="mb-1">Request a Quote</h3>
          <p class="text-muted mb-4">Share your travel dates and preferences. We reply within 24 hours on business days.</p>

          <form method="post" action="<?php print_link("info/contact"); ?>">
            <input type="hidden" name="csrf_token" value="<?= Csrf::$token ?>" />

            <div class="row gy-3">
              <div class="col-md-6">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" required id="name" name="name" placeholder="Your full name">
              </div>
              <div class="col-md-6">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" required id="email" name="email" placeholder="you@example.com">
              </div>

              <div class="col-md-6">
                <label class="form-label" for="destination">Destination</label>
                <select class="form-select" id="destination" name="destination">
                  <option value="">Select</option>
                  <option>Namibia</option>
                  <option>Botswana</option>
                  <option>South Africa</option>
                  <option>Zambia</option>
                  <option>Angola</option>
                  <option>Multi-country</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="travel_style">Travel style</label>
                <select class="form-select" id="travel_style" name="travel_style">
                  <option value="">Select</option>
                  <option>Guided safari</option>
                  <option>Self-drive</option>
                  <option>Camping</option>
                  <option>Honeymoon</option>
                  <option>Family</option>
                  <option>Corporate / group</option>
                </select>
              </div>

              <div class="col-12">
                <label class="form-label" for="msg">Message</label>
                <textarea class="form-control" id="msg" name="msg" rows="6" required
                  placeholder="Example: 2 adults, 8–12 days, start date, budget range, must-see places, and any preferences."></textarea>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Send request</button>
                <small class="d-block mt-2 text-muted">By sending, you agree we may contact you to finalise details.</small>
              </div>
            </div>
          </form>

        </div>
      </div>

      <div class="col-lg-6">
        <div class="p-4 border rounded-4 h-100">
          <h3 class="mb-3">Other ways to reach us</h3>
          <p class="text-muted">For urgent changes during travel, please use WhatsApp or call.</p>

          <div class="d-flex mb-3">
            <i class="bi bi-geo-alt fs-4 me-3"></i>
            <div>
              <h6 class="mb-1">Location</h6>
              <p class="mb-0 text-muted">Windhoek, Namibia</p>
            </div>
          </div>

          <div class="d-flex mb-3">
            <i class="bi bi-envelope fs-4 me-3"></i>
            <div>
              <h6 class="mb-1">Email</h6>
              <p class="mb-0 text-muted"><?= defined('DEFAULT_EMAIL') ? DEFAULT_EMAIL : 'info@namwel.com.na' ?></p>
            </div>
          </div>

          <div class="d-flex mb-3">
            <i class="bi bi-clock fs-4 me-3"></i>
            <div>
              <h6 class="mb-1">Hours</h6>
              <p class="mb-0 text-muted">Mon–Fri, 08:00–17:00</p>
            </div>
          </div>

          <hr />

          <h5 class="mb-2">What to include in your request</h5>
          <ul class="text-muted mb-0">
            <li>Travel dates (or flexible window)</li>
            <li>Number of travellers and ages (if family)</li>
            <li>Preferred accommodation style (camping / midrange / luxury)</li>
            <li>Must‑see places and activities</li>
            <li>Budget range (optional but helpful)</li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>
