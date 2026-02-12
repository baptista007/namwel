<?php
// Public home page (no DB dependency)
// Customize content freely in: app/views/partials/index/index.php
$comp_model = new SharedController();
$db = $comp_model->GetModel();
$testimonials = $db->rawQuery("SELECT * FROM testimonials WHERE is_approved = 1");
?>
<!-- Travel Hero Section -->
<section id="travel-hero" class="travel-hero section dark-background">

    <div class="hero-background">
        <video autoplay muted loop playsinline>
            <source src="<?= SITE_ADDR ?>assets/videos/NAMIBIA.mp40001.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
    </div>

    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-text" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="hero-title">Namibia & Southern Africa, the way you imagined it</h1>
                    <p class="hero-subtitle">
                        NamWel offers you a memorable experience with tailor-made tours. Guided tour, Car rental, Camping circuits, Honeymoon, and more.
                    </p>
                    <div class="hero-buttons">
                        <a href="<?= get_link('destinations/index') ?>" class="btn btn-primary me-3">Explore Destinations</a>
                        <a href="<?= get_link('packages/index') ?>" class="btn btn-outline">Browse Packages</a>
                    </div>

                    <div class="mt-4 d-flex flex-wrap gap-3 small text-light opacity-75">
                        <div><i class="bi bi-shield-check me-2"></i>Trusted local guides</div>
                        <div><i class="bi bi-car-front me-2"></i>Self‑drive & guided options</div>
                        <div><i class="bi bi-geo-alt me-2"></i>Border‑ready itineraries</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="booking-form-wrapper" data-aos="fade-left" data-aos-delay="200">
                    <div class="booking-form">
                        <h3 class="form-title">Request a Quote</h3>
                        <p class="text-muted mb-3">We respond within 24 hours on business days.</p>

                        <form action="<?= get_link('info/contact') ?>#quote" method="get">
                            <div class="form-group mb-3">
                                <label for="destination">Destination</label>
                                <select name="destination" id="destination" class="form-select" required>
                                    <option value="">Choose a destination</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Multi-country">Multi‑country</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="start">Start Date</label>
                                        <input type="date" name="start" id="start" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="days">Trip Length</label>
                                        <select name="days" id="days" class="form-select" required>
                                            <option value="">Days</option>
                                            <option value="3-5">3–5</option>
                                            <option value="6-8">6–8</option>
                                            <option value="9-12">9–12</option>
                                            <option value="13-16">13–16</option>
                                            <option value="17+">17+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="travelers">Travellers</label>
                                        <select name="travelers" id="travelers" class="form-select" required>
                                            <option value="">People</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3-4">3–4</option>
                                            <option value="5-8">5–8</option>
                                            <option value="9+">9+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="style">Travel Style</label>
                                        <select name="style" id="style" class="form-select" required>
                                            <option value="">Choose</option>
                                            <option value="Guided Safari">Guided safari</option>
                                            <option value="Self-drive">Self‑drive</option>
                                            <option value="Camping">Camping</option>
                                            <option value="Honeymoon">Honeymoon</option>
                                            <option value="Family">Family</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Continue</button>
                            <small class="d-block mt-2 text-muted">Or call/WhatsApp via the Contact page.</small>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /Travel Hero Section -->

<!-- Why Us Section -->
<section id="why-us" class="why-us section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

    <!-- About Us Content -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="content">
            <h3>Explore the World with Confidence</h3>
            <p>
                Our mission is to offer you tailor-made adventures that celebrate the natural, cultural, and human richness of Southern Africa. As an intermediary between you and our carefully selected local partners, we guarantee quality travel that respects local communities and the environment.
            </p>
            <p class="mb-0">
                Namwel Tours & Car Rental, the local tour operator that will make your dreams come true!
            </p>
            <!-- <div class="stats-row">
                <div class="stat-item">
                    <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="2" class="purecounter">0</span>
                    <div class="stat-label">Happy Travelers</div>
                </div>
                <div class="stat-item">
                    <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="2" class="purecounter">0</span>
                    <div class="stat-label">Countries Covered</div>
                </div>
                <div class="stat-item">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2" class="purecounter">0</span>
                    <div class="stat-label">Years Experience</div>
                </div>
            </div> -->
        </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="about-image">
            <img src="<?= SITE_ADDR ?>assets/images/namwel-logo-new.png" alt="Namwel Logo" class="img-fluid rounded-4">
            <div class="experience-badge">
            <div class="experience-number">Your dream travel</div>
            <div class="experience-number">a reality</div>
            </div>
        </div>
        </div>
    </div><!-- End About Us Content -->

    <!-- Why Choose Us -->
    <div class="why-choose-section">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                <h3>Why Choose Us for Your Next Adventure</h3>
                <p>We are committed to providing you with the best travel experience possible. Our team of experienced professionals is dedicated to ensuring that your journey is safe, comfortable, and memorable.</p>
            </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h4>Local expertise</h4>
                    <p>Routes designed by people who live and travel here.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4>Responsive Support</h4>
                    <p>Clear communication before, during, and after your trip.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-cash"></i>
                    </div>
                    <h4>Best Prices</h4>
                    <p>Competitive pricing with no compromise on quality.</p>
                    </div>
                </div>
            </div><!-- End Features Grid -->
        </div><!-- End Why Choose Us -->

    </div>

</section><!-- /Why Us Section -->

<!-- Featured Tours Section -->
<section id="featured-tours" class="featured-tours section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Featured Tours</h2>
        <div><span>Check Our</span> <span class="description-title">Featured Tours</span></div>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="tour-card">
            <div class="tour-image">
            <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" alt="The treasure of southern Africa" class="img-fluid" loading="lazy">
            <div class="tour-badge">Top Rated</div>
            <div class="tour-price">From NAD55,000</div>
            </div>
            <div class="tour-content">
            <h4>The treasure of southern Africa</h4>
            <div class="tour-meta">
                <span class="duration"><i class="bi bi-clock"></i> 15 Days</span>
                <span class="group-size"><i class="bi bi-people"></i> 14 Nights</span>
            </div>
            <p>This 14-day tour takes you to the heart of Southern Africa, a region of exceptional natural and cultural richness. From Namibia, with its spectacular dunes and abundant wildlife, to Botswana and its famous national parks, and finally to the majestic Victoria Falls in Zimbabwe, each stop offers an immersion in unique landscapes and authentic traditions.</p>
            <div class="tour-highlights">
                <span>Botswana</span>
                <span>Namibia</span>
                <span>Zimbabwe</span>
            </div>
            <div class="tour-action">
                <a href="<?= get_link('index/book/southern-africa') ?>" class="btn-book">Book Now</a>
                <div class="tour-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <span>4.8 (95)</span>
                </div>
            </div>
            </div>
        </div>
        </div><!-- End Tour Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="tour-card">
            <div class="tour-image">
            <img src="<?= SITE_ADDR ?>assets/images/travel/Elephants.png" alt="Fascinating Southern Africa" class="img-fluid" loading="lazy">
            <div class="tour-badge limited">Only 3 Spots!</div>
            <div class="tour-price">From NAD61,000</div>
            </div>
            <div class="tour-content">
            <h4>Fascinating Southern Africa</h4>
            <div class="tour-meta">
                <span class="duration"><i class="bi bi-clock"></i> 17 Days</span>
                <span class="group-size"><i class="bi bi-people"></i> 16 Nights</span>
            </div>
            <p>Embark on an exceptional journey through Southern Africa with our Fascinating Southern Africa tour , a comprehensive 17-day adventure linking three iconic countries: Namibia, Botswana, and Zimbabwe.</p>
            <div class="tour-highlights">
                <span>Botswana</span>
                <span>Namibia</span>
                <span>Zimbabwe</span>
            </div>
            <div class="tour-action">
                <a href="<?= get_link('index/book/southern-africa') ?>" class="btn-book">Book Now</a>
                <div class="tour-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i>
                <span>4.6 (55)</span>
                </div>
            </div>
            </div>
        </div>
        </div><!-- End Tour Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="tour-card">
            <div class="tour-image">
            <img src="<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg" alt="Desert Safari" class="img-fluid" loading="lazy">
            <div class="tour-badge new">Newly Added</div>
            <div class="tour-price">From NAD51,000</div>
            </div>
            <div class="tour-content">
            <h4>Namibian Great Outdoors</h4>
            <div class="tour-meta">
                <span class="duration"><i class="bi bi-clock"></i> 5 Days</span>
                <span class="group-size"><i class="bi bi-people"></i> Max 10</span>
            </div>
            <p>Embark on a 14-day adventure exploring Namibia's vast landscapes: Etosha National Park, Damaraland, the Skeleton Coast, the Namib Desert, and the Kalahari. Enjoy safaris, breathtaking scenery, and cultural immersion in the heart of Namibian nature. This guided tour is ideal for small groups seeking adventure and comfort.</p>
            <div class="tour-highlights">
                <span>Namibia</span>
            </div>
            <div class="tour-action">
                <a href="<?= get_link('index/book/southern-africa') ?>" class="btn-book">Book Now</a>
                <div class="tour-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <span>4.9 (72)</span>
                </div>
            </div>
            </div>
        </div>
        </div><!-- End Tour Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="tour-card">
            <div class="tour-image">
            <img src="<?= SITE_ADDR ?>assets/images/travel/aerial-view-of-the-okavango-delta-channels-and-landscape.jpg" alt="A stroll around the Okavango" class="img-fluid" loading="lazy">
            <div class="tour-badge">Popular Choice</div>
            <div class="tour-price">From NAD58,900</div>
            </div>
            <div class="tour-content">
            <h4>A stroll around the Okavango</h4>
            <div class="tour-meta">
                <span class="duration"><i class="bi bi-clock"></i> 9 Days</span>
                <span class="group-size"><i class="bi bi-people"></i> Max 15</span>
            </div>
            <p>The journey to the heart of the Okavango Delta is an immersive safari experience through Namibia, Botswana, and Zimbabwe, offering a perfect balance of wildlife, river landscapes, and iconic natural wonders.</p>
            <div class="tour-highlights">
                <span>Botswana</span>
                <span>Namibia</span>
                <span>Zimbabwe</span>
            </div>
            <div class="tour-action">
                <a href="<?= get_link('index/book/southern-africa') ?>" class="btn-book">Book Now</a>
                <div class="tour-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <span>4.7 (110)</span>
                </div>
            </div>
            </div>
        </div>
        </div><!-- End Tour Item -->
    </div>

    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
        <a href="<?= get_link('packages/index') ?>" class="btn-view-all">View All Tours</a>
    </div>

    </div>

</section><!-- /Featured Tours Section -->

<section class="cta-section py-5" style="background-color:#548b31;">
  <div class="container text-center text-white">
    <h2 class="mb-3 fw-bold text-white">
      Your African Journey Starts Here
    </h2>
    <p class="mb-4 fs-5">
      From iconic landscapes to hidden gems, let Namwel Tours & Safaris design a seamless,
      unforgettable experience across Southern Africa.
    </p>

    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="<?= get_link('index/quote') ?>" 
         class="btn btn-light btn-lg fw-semibold px-4">
        Plan My Trip
      </a>

      <a href="<?= get_link('destinations/index') ?>" 
         class="btn btn-outline-light btn-lg px-4">
        View Destinations
      </a>
    </div>
  </div>
</section>

<!-- Destinations Highlights -->
<section class="destinations-section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Top Destinations</h2>
        <div>From <span>iconic desert landscapes</span> to world-class wildlife and waterfalls.</div>
    </div>

    <div class="container">
        <div class="destinations-grid">
        <a href="#" class="dest-card" style="--bg-img: url('<?= SITE_ADDR ?>assets/images/travel/destinations/pt-namibia.jpg')">
            <div class="card-content">
                <h3>Namibia</h3>
                <p>Sossusvlei dunes, Etosha wildlife, Swakopmund coast, and the Skeleton Coast.</p>
                <span class="cta-link">Explore Namibia →</span>
            </div>
        </a>

        <a href="#" class="dest-card" style="--bg-img: url('<?= SITE_ADDR ?>assets/images/travel/destinations/Botswana_Okavango.jpg')">
            <div class="card-content">
                <h3>Botswana</h3>
                <p>Okavango Delta, Chobe River cruises, Moremi safaris, and pristine wilderness.</p>
                <span class="cta-link">Explore Botswana →</span>
            </div>
        </a>

        <a href="#" class="dest-card" style="--bg-img: url('<?= SITE_ADDR ?>assets/images/travel/destinations/zambia.jpg')">
            <div class="card-content">
                <h3>Zambia</h3>
                <p>Victoria Falls, Zambezi activities, South Luangwa, and remote safari camps.</p>
                <span class="cta-link">Explore Zambia →</span>
            </div>
        </a>

        <a href="#" class="dest-card" style="--bg-img: url('<?= SITE_ADDR ?>assets/images/travel/destinations/south-africa.jpg')">
            <div class="card-content">
                <h3>South Africa</h3>
                <p>Cape Town & Garden Route, Winelands, Kruger-area safaris, and culture.</p>
                <span class="cta-link">Explore South Africa →</span>
            </div>
        </a>

        <a href="#" class="dest-card" style="--bg-img: url('<?= SITE_ADDR ?>assets/images/travel/destinations/angola.jpg')">
            <div class="card-content">
                <h3>Angola</h3>
                <p>Hidden beaches, dramatic escarpments, waterfalls, and vibrant cities.</p>
                <span class="cta-link">Explore Angola →</span>
            </div>
        </a>
        </div>
    </div>
</section>
<!-- /Destinations Highlights -->


<section id="testimonials-home" class="testimonials-home section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <div><span>What Our Customers</span> <span class="description-title">Are Saying</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                "loop": true,
                "speed": 600,
                "autoplay": {
                    "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "breakpoints": {
                    "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 40
                    },
                    "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 1
                    }
                }
                }
            </script>
            <div class="swiper-wrapper">
                <?php
                    foreach ($testimonials as $testimonial) {
                        echo '<div class="swiper-slide">';
                        echo '<div class="testimonial-item">';
                        echo '<p>';
                        echo '<i class="bi bi-quote quote-icon-left"></i>';
                        echo '<span class="testimonial-message">' . $testimonial['message'] . '</span>';
                        echo '<i class="bi bi-quote quote-icon-right"></i>';
                        echo '</p>';
                        // echo '<img src="assets/img/person/person-m-9.webp" class="testimonial-img" alt="">';
                        echo '<h3>' . $testimonial['fullname'] . '</h3>';
                        echo '</div>';
                        echo '</div>';    
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Packages -->
<section id="packages" class="py-5 light-background">
    <div class="container" data-aos="fade-up">
        
        <div class="text-center mb-2">
            <div class="section-title">
                <h2>Popular Packages</h2>
                <div><span>Choose a ready-made package or ask for a tailor-made itinerary.</span></div>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-item position-relative h-100">
                    <div class="icon"><i class="bi bi-tags"></i></div>
                    <h3>Special Offers</h3>
                    <p class="text-muted">Seasonal deals, last-minute departures, and value-packed short breaks.</p>
                    <a href="<?= get_link('packages/special_offers') ?>" class="readmore stretched-link">View offers <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-item position-relative h-100">
                    <div class="icon"><i class="bi bi-heart"></i></div>
                    <h3>Honeymoon</h3>
                    <p class="text-muted">Romantic lodges, privacy, sunsets, and unforgettable experiences for two.</p>
                    <a href="<?= get_link('packages/honeymoon') ?>" class="readmore stretched-link">View honeymoon trips <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-item position-relative h-100">
                    <div class="icon"><i class="bi bi-fire"></i></div>
                    <h3>Camping & Overland</h3>
                    <p class="text-muted">4x4-friendly routes, camp setups, national parks, and guided or self-drive options.</p>
                    <a href="<?= get_link('packages/camping') ?>" class="readmore stretched-link">View camping trips <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Packages -->

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section light-background">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="hero-content" data-aos="zoom-in" data-aos-delay="200">
            <div class="content-wrapper">
            <div class="badge-wrapper">
                <span class="promo-badge">Limited Time Offer</span>
            </div>
            <h2>Discover Your Next Adventure</h2>
            <p>Unlock incredible destinations with our specially curated travel packages. From exotic beaches to mountain peaks, your perfect getaway awaits.</p>

            <div class="action-section">
                <div class="main-actions">
                    <a href="<?= get_link('destinations/index') ?>" class="btn btn-explore">
                        <i class="bi bi-compass"></i>
                        Explore Now
                    </a>
                </div>

                <div class="quick-contact">
                    <span class="contact-label">Need help choosing?</span>
                    <a href="tel:+26461244698" class="contact-link">
                        <i class="bi bi-telephone"></i>
                        Call +264 61 244 698
                    </a>
                </div>
            </div>
            </div>

            <div class="visual-element">
                <img src="<?= SITE_ADDR ?>assets/images/namwel-welwitchia.png" alt="Namwel Logo" class="img-fluid rounded-4">
                <div class="image-overlay">
                    <div class="stat-item">
                    <span class="stat-number">5+</span>
                    <span class="stat-label">Destinations/Countries</span>
                    </div>
                    <div class="stat-item">
                    <span class="stat-number">100+</span>
                    <span class="stat-label">Happy Travelers</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="newsletter-section" data-aos="fade-up" data-aos-delay="300">
            <div class="newsletter-card">
            <div class="newsletter-content">
                <div class="newsletter-icon">
                    <i class="bi bi-envelope-heart"></i>
                </div>
                <div class="newsletter-text">
                    <h3>Stay in the Loop</h3>
                    <p>Get exclusive travel deals and destination guides delivered to your inbox</p>
                </div>
            </div>

            <form class="php-email-form newsletter-form" action="" method="post">
                <div class="form-wrapper">
                    <input type="email" name="email" class="email-input" placeholder="Your email address" required="">
                    <button type="submit" class="subscribe-btn">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>

                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Welcome aboard! Check your email for exclusive offers.</div>

                <div class="trust-indicators">
                <i class="bi bi-lock"></i>
                <span>We protect your privacy. Unsubscribe anytime.</span>
                </div>
            </form>
            </div>
        </div>

    </div>

</section><!-- /Call To Action Section -->