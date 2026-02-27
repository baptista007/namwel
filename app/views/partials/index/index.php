<?php
// Public home page (no DB dependency)
// Customize content freely in: app/views/partials/index/index.php
$comp_model = new SharedController();
$db = $comp_model->GetModel();
$testimonials = $db->rawQuery("SELECT * FROM testimonials WHERE is_approved = 1");
?>
<!-- Hero Section -->
<section class="hero" id="hero">
    <video autoplay muted loop playsinline>
        <source src="<?= SITE_ADDR ?>assets/videos/NAMIBIA.mp40001.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>    
    <div class="hero-content">
        <h1>Namibia & Southern Africa, the way you imagined it</h1>
        <p class="hero-subtitle">NamWel offers you a memorable experience with tailor-made tours. Guided tour, Car rental, Camping circuits, Honeymoon, and more.</p>
        <div class="hero-buttons">
            <a href="#lead-form" class="btn btn-primary pulse">
                <i class="fas fa-compass"></i>
                Start Your Journey
            </a>
            <a href="#packages" class="btn btn-outline">
                <i class="fas fa-download"></i>
                Our Packages
            </a>
        </div>
        <div class="hero-trust">
            <div class="trust-item">
                <i class="fas fa-star"></i>
                <span>4.9/5 Google Reviews</span>
            </div>
            <div class="trust-item">
                <i class="fas fa-users"></i>
                <span>5000+ Happy Travelers</span>
            </div>
            <div class="trust-item">
                <i class="fas fa-award"></i>
                <span>9+ Years Experience</span>
            </div>
        </div>
    </div>
</section>

<!-- Trust Bar -->
<section class="trust-bar">
    <div class="">
        <!-- <div class="trust-bar-inner">
            <div class="trust-stat">
                <div class="trust-stat-number">5000+</div>
                <div class="trust-stat-label">Happy Travelers</div>
            </div>
            <div class="trust-stat">
                <div class="trust-stat-number">15+</div>
                <div class="trust-stat-label">Years Experience</div>
            </div>
            <div class="trust-stat">
                <div class="trust-stat-number">50+</div>
                <div class="trust-stat-label">Expert Guides</div>
            </div>
            <div class="trust-stat">
                <div class="trust-stat-number">98%</div>
                <div class="trust-stat-label">Return Guests</div>
            </div>
        </div> -->
        <form action="" class="trust-bar-inner">
            <div class="col-md-3">
                <label class="form-label small fw-bold">DESTINATION</label>
                <select class="form-select border-0 bg-light">
                    <option value="Angola">Angola</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Namibia">Namibia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-bold">MONTH</label>
                <select class="form-select border-0 bg-light">
                    <option>June - August (Dry)</option>
                    <option>Dec - Feb (Green)</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-bold">STYLE</label>
                <select class="form-select border-0 bg-light">
                    <option>5* Hotel - Lodge</option>
                    <option>Lodge - Rest Camp</option>
                    <option>Guest Farm</option>
                    <option>Guest House</option>
                    <option>Camping - Self Catering</option>
                </select>
            </div>
            <div class="col-md-3 d-grid">
                <button type="submit" class="btn btn-primary mt-auto py-2">Find My Tour</button>
            </div>
        </form>
    </div>
</section>

<!-- Value Propositions -->
<section class="value-props" id="value-props">
    <div class="container">
        <div class="section-header">
            <h2>Why Travel With Namwel</h2>
            <p>We don't just show you Africa — we help you fall in love with it.</p>
        </div>
        <div class="value-grid">
            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>Expert Local Guides</h3>
                <p>Our guides average 5+ years of experience. They're passionate storytellers who make every sighting unforgettable.</p>
            </div>
            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <h3>Self‑drive & guided options</h3>
                <p>Choose between self‑drive and guided options to suit your preferences and budget.</p>
            </div>
            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Private & Personal</h3>
                <p>Customized itineraries tailored to your interests and pace.</p>
            </div>
        </div>
    </div>
</section>

<!-- Packages Section -->
<section class="packages" id="packages">
    <div class="container">
        <div class="section-header">
            <h2>Featured Safari Packages</h2>
            <p>Our most popular adventures, handcrafted for unforgettable experiences</p>
        </div>
        <div class="packages-grid">
            <!-- Package 1 -->
            <div class="package-card fade-in">
                <div class="package-image">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg" alt="Kruger Safari">
                    <span class="package-badge">Best Seller</span>
                    <span class="package-availability"><i class="fas fa-fire"></i> Only 3 spots left</span>
                </div>
                <div class="package-content">
                    <div class="package-location">Botswana / Namibia / Zambia</div>
                    <h3 class="package-title">The treasure of southern Africa</h3>
                    <div class="package-duration">15 Days / 14 Nights</div>
                    <div class="package-highlights">
                        <p>This 14-day tour takes you to the heart of Southern Africa, a region of exceptional natural and cultural richness. From Namibia, with its spectacular dunes and abundant wildlife, to Botswana and its famous national parks, and finally to the majestic Victoria Falls in Zimbabwe, each stop offers an immersion in unique landscapes and authentic traditions.</p>

                    </div>
                    <div class="package-footer">
                        <div class="package-price">
                            <span class="price-current">$2,499</span>
                            <span class="price-original">$2,999</span>
                        </div>
                        <button class="btn btn-primary package-btn" onclick="openModal('lead-modal')">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>

            <!-- Package 2 -->
            <div class="package-card fade-in">
                <div class="package-image">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/Elephants.png" alt="Okavango Delta">
                    <span class="package-badge">Premium</span>
                    <span class="package-availability"><i class="fas fa-clock"></i> Limited availability</span>
                </div>
                <div class="package-content">
                    <div class="package-location">Botswana / Namibia / Zimbabwe</div>
                    <h3 class="package-title">Fascinating Southern Africa</h3>
                    <div class="package-duration">17 Days / 16 Nights</div>
                    <div class="package-highlights">
                        <p>Embark on an exceptional journey through Southern Africa with our Fascinating Southern Africa tour , a comprehensive 17-day adventure linking three iconic countries: Namibia, Botswana, and Zimbabwe.</p>
                        <span class="highlight-tag"><i class="fas fa-tint"></i> Falls Viewing</span>
                        <span class="highlight-tag"><i class="fas fa-ship"></i> Sunset Cruise</span>
                        <span class="highlight-tag"><i class="fas fa-mountain"></i> Adventure Activities</span>
                    </div>
                    <div class="package-footer">
                        <div class="package-price">
                            <span class="price-current">$3,499</span>
                            <span class="price-original">$4,199</span>
                        </div>
                        <button class="btn btn-primary package-btn" onclick="openModal('lead-modal')">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>

            <!-- Package 3 -->
            <div class="package-card fade-in">
                <div class="package-image">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg" alt="Namibia">
                    <span class="package-badge">Popular</span>
                    <span class="package-availability"><i class="fas fa-star"></i> Top Rated</span>
                </div>
                <div class="package-content">
                    <div class="package-location">Namibia</div>
                    <h3 class="package-title">Namibian Great Outdoors</h3>
                    <div class="package-duration">4 Days / 3 Nights</div>
                    <div class="package-highlights">
                        <p>Embark on a 14-day adventure exploring Namibia's vast landscapes: Etosha National Park, Damaraland, the Skeleton Coast, the Namib Desert, and the Kalahari. Enjoy safaris, breathtaking scenery, and cultural immersion in the heart of Namibian nature. This guided tour is ideal for small groups seeking adventure and comfort.</p>
                        <div class="package-highlights">
                            <span class="highlight-tag"><i class="fas fa-mountain"></i> Sossusvlei Dunes</span>
                            <span class="highlight-tag"><i class="fas fa-paw"></i> Desert Wildlife</span>
                            <span class="highlight-tag"><i class="fas fa-star"></i> Stargazing</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="package-price">
                            <span class="price-current">$1,899</span>
                            <span class="price-original">$2,299</span>
                        </div>
                        <button class="btn btn-primary package-btn" onclick="openModal('lead-modal')">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>

            <!-- Package 4 -->
            <div class="package-card fade-in">
                <div class="package-image">
                    <img src="<?= SITE_ADDR ?>assets/images/travel/aerial-view-of-the-okavango-delta-channels-and-landscape.jpg" alt="Okavango Delta">
                    <span class="package-badge">Botswana / Namibia / Zambia</span>
                    <span class="package-availability"><i class="fas fa-gem"></i> Unique Experience</span>
                </div>
                <div class="package-content">
                    <div class="package-location">Namibia</div>
                    <h3 class="package-title">A stroll around the Okavango</h3>
                    <div class="package-duration">7 Days / 6 Nights</div>
                    <p>The journey to the heart of the Okavango Delta is an immersive safari experience through Namibia, Botswana, and Zimbabwe, offering a perfect balance of wildlife, river landscapes, and iconic natural wonders.</p>
                    <div class="package-highlights">
                        <span class="highlight-tag"><i class="fas fa-mountain"></i> Sossusvlei Dunes</span>
                        <span class="highlight-tag"><i class="fas fa-paw"></i> Desert Wildlife</span>
                        <span class="highlight-tag"><i class="fas fa-star"></i> Stargazing</span>
                    </div>
                    <div class="package-footer">
                        <div class="package-price">
                            <span class="price-current">$2,799</span>
                            <span class="price-original">$3,399</span>
                        </div>
                        <button class="btn btn-primary package-btn" onclick="openModal('lead-modal')">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Urgency Section -->
<section class="urgency" id="urgency">
    <div class="container">
        <div class="urgency-inner">
            <div class="urgency-content">
                <h2>Limited Time Offer</h2>
                <p>Book any 2026 tour before March 31st and receive a complimentary sunset dinner experience. Don't miss out on these exclusive dates!</p>
            </div>
            <div class="countdown-wrapper">
                <div class="countdown-label">Offer Ends In</div>
                <div class="countdown" id="countdown">
                    <div class="countdown-item">
                        <div class="countdown-number" id="days">00</div>
                        <div class="countdown-text">Days</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="hours">00</div>
                        <div class="countdown-text">Hours</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="minutes">00</div>
                        <div class="countdown-text">Minutes</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="seconds">00</div>
                        <div class="countdown-text">Seconds</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section class="experience" id="experience">
    <div class="container">
        <div class="section-header">
            <h2>The Namwel Experience</h2>
            <p>Every detail is crafted to create moments you'll treasure forever</p>
        </div>
        <div class="experience-grid">
            <div class="experience-card fade-in">
                <div class="experience-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3>Local expertise</h3>
                <p>Routes designed by people who live and travel here</p>
            </div>
            <div class="experience-card fade-in">
                <div class="experience-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <h3>Luxury Vehicles</h3>
                <p>Private 4x4 safaris with guaranteed window seats</p>
            </div>
            <div class="experience-card fade-in">
                <div class="experience-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>24/7 Support</h3>
                <p>Round-the-clock assistance throughout your journey</p>
            </div>
            <div class="experience-card fade-in">
                <div class="experience-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Self‑drive & guided options</h3>
                <p>Self‑drive & guided options</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-header">
            <h2>What Our Travelers Say</h2>
            <p>Real stories from guests who've experienced the magic of Africa</p>
        </div>
        <div class="testimonial-slider">
            <div class="testimonial-track">
                <?php
                    $count = 0;
                    foreach ($testimonials as $testimonial) {
                        echo '<div class="testimonial-slide ' . ($count == 0 ? 'active' : '') . '">';
                        echo '<img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&q=80" alt="Sarah M." class="testimonial-image">';
                        echo '<div class="testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>';
                        echo '<p class="testimonial-quote">';
                        echo '<i class="bi bi-quote quote-icon-left"></i>';
                        echo $testimonial['message'];
                        echo '<i class="bi bi-quote quote-icon-right"></i>';
                        echo '</p>';
                        echo '<p class="testimonial-author">' . $testimonial['fullname'] . '</p>';
                        echo '<p class="testimonial-country">' . $testimonial['country'] . '</p>';
                        echo '</div>';
                        $count++;
                    }
                ?>
            </div>
            <div class="testimonial-dots">
                <?php
                    for ($i = 0; $i < $count; $i++) {
                        echo '<span class="testimonial-dot' . ($i == 0 ? ' active' : '') . '" data-index="' . $i . '"></span>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Lead Form Section -->
<section class="lead-form-section" id="lead-form">
    <div class="container">
        <div class="lead-form-container">
            <div class="form-header">
                <h2>Plan Your Dream Safari</h2>
                <p>Get your free personalized itinerary within 24 hours</p>
            </div>

            <div class="form-progress-bar">
                <div class="progress-step active" data-step="1">
                    <div class="progress-circle">1</div>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step" data-step="2">
                    <div class="progress-circle">2</div>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step" data-step="3">
                    <div class="progress-circle">3</div>
                </div>
            </div>

            <form id="leadForm" onsubmit="handleSubmit(event)">
                <!-- Step 1: Destination -->
                <div class="form-step active" data-step="1">
                    <div class="form-group">
                        <label>Where would you like to go?</label>
                        <div class="radio-group">
                            <label class="radio-option" onclick="selectRadio(this)">
                                <input type="radio" name="destination" value="south-africa" required>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>South Africa</span>
                            </label>
                            <label class="radio-option" onclick="selectRadio(this)">
                                <input type="radio" name="destination" value="botswana">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Botswana</span>
                            </label>
                            <label class="radio-option" onclick="selectRadio(this)">
                                <input type="radio" name="destination" value="zambia-zimbabwe">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Zambia / Zimbabwe</span>
                            </label>
                            <label class="radio-option" onclick="selectRadio(this)">
                                <input type="radio" name="destination" value="namibia">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Namibia</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-nav">
                        <div></div>
                        <button type="button" class="btn btn-primary" onclick="nextStep()">
                            Next <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Dates -->
                <div class="form-step" data-step="2">
                    <div class="form-group">
                        <label>When do you want to travel?</label>
                        <input type="text" name="dates" placeholder="e.g., June 2025 - July 2025" required>
                    </div>
                    <div class="form-group">
                        <label>Number of Travelers</label>
                        <select name="travelers" required>
                            <option value="">Select travelers</option>
                            <option value="1">1 Guest</option>
                            <option value="2">2 Guests</option>
                            <option value="3">3 Guests</option>
                            <option value="4">4 Guests</option>
                            <option value="5">5 Guests</option>
                            <option value="6+">6+ Guests</option>
                        </select>
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                        <button type="button" class="btn btn-primary" onclick="nextStep()">
                            Next <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Contact -->
                <div class="form-step" data-step="3">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" placeholder="Your name" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="your@email.com" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" placeholder="+1 234 567 8900">
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Submit Request
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>