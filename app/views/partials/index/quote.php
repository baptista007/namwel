<?php

?>
<!-- How It Works -->
<section class="how-it-works">
    <div class="container">
        <div class="section-header">
            <h2>How It Works</h2>
            <p>Getting your custom quote is simple</p>
        </div>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <h3>Share Your Vision</h3>
                <p>Tell us about your dream Safari, preferred dates, and travel style.</p>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <h3>We Customize</h3>
                <p>Our experts craft a personalized itinerary tailored just for you.</p>
            </div>
            <div class="step-card">
                <div class="step-number">3</div>
                <h3>Receive Quote</h3>
                <p>Get your detailed quote with pricing and all inclusions within 24 hours.</p>
            </div>
            <div class="step-card">
                <div class="step-number">4</div>
                <h3>Book & Enjoy</h3>
                <p>Confirm your booking and look forward to an unforgettable adventure!</p>
            </div>
        </div>
    </div>
</section>

<!-- Quote Form -->
<section class="quote-section">
    <div class="container">
        <div class="quote-container">
            <div class="form-header">
                <h2>Start Your Journey</h2>
                <p>Fill out the form below and we'll get back to you within 24 hours</p>
            </div>

            <!-- Progress Bar -->
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

            <form id="quoteForm">
                <!-- Step 1: Trip Details -->
                <div class="form-step active" data-step="1">
                    <h3 class="form-section-title">Trip Preferences</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Destination(s) <span class="required">*</span></label>
                            <div class="checkbox-group">
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="sossusvlei">
                                    <i class="fas fa-check"></i>
                                    <span>Sossusvlei Dunes</span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="etosha">
                                    <i class="fas fa-check"></i>
                                    <span>Etosha National Park</span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="swakopmund">
                                    <i class="fas fa-check"></i>
                                    <span>Swakopmund</span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="fish-river">
                                    <i class="fas fa-check"></i>
                                    <span>Fish River Canyon</span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="skeleton-coast">
                                    <i class="fas fa-check"></i>
                                    <span>Skeleton Coast</span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="windhoek">
                                    <i class="fas fa-check"></i>
                                    <span>Windhoek</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Trip Type <span class="required">*</span></label>
                            <div class="radio-group">
                                <label class="radio-option" onclick="selectRadio(this)">
                                    <input type="radio" name="tripType" value="guided-tour" checked>
                                    <i class="fas fa-user-tie"></i>
                                    <span>Guided Tour</span>
                                </label>
                                <label class="radio-option" onclick="selectRadio(this)">
                                    <input type="radio" name="tripType" value="self-drive">
                                    <i class="fas fa-car"></i>
                                    <span>Self-Drive</span>
                                </label>
                                <label class="radio-option" onclick="selectRadio(this)">
                                    <input type="radio" name="tripType" value="car-rental">
                                    <i class="fas fa-key"></i>
                                    <span>Car Rental Only</span>
                                </label>
                                <label class="radio-option" onclick="selectRadio(this)">
                                    <input type="radio" name="tripType" value="custom">
                                    <i class="fas fa-magic"></i>
                                    <span>Custom Package</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Preferred Accommodation Level</label>
                            <select name="accommodation">
                                <option value="">Select preference</option>
                                <option value="budget">Budget / Camping</option>
                                <option value="mid-range">Mid-Range Lodges</option>
                                <option value="luxury">Luxury Lodges</option>
                                <option value="ultra-luxury">Ultra-Luxury</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Number of Travelers <span class="required">*</span></label>
                            <select name="travelers" required>
                                <option value="">Select travelers</option>
                                <option value="1">1 Guest</option>
                                <option value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5 Guests</option>
                                <option value="6">6 Guests</option>
                                <option value="7+">7+ Guests</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-nav">
                        <div></div>
                        <button type="button" class="btn btn-primary" onclick="nextStep()">
                            Next Step <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Dates & Budget -->
                <div class="form-step" data-step="2">
                    <h3 class="form-section-title">Travel Dates & Budget</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Preferred Start Date</label>
                            <input type="date" name="startDate">
                        </div>
                        <div class="form-group">
                            <label>Preferred End Date</label>
                            <input type="date" name="endDate">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Flexible with Dates?</label>
                            <select name="dateFlexibility">
                                <option value="">Select option</option>
                                <option value="strict">Strict Dates</option>
                                <option value="flexible">Flexible (+/- 3 days)</option>
                                <option value="very-flexible">Very Flexible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Estimated Budget (per person)</label>
                            <select name="budget">
                                <option value="">Select budget range</option>
                                <option value="under-1000">Under $1,000</option>
                                <option value="1000-2000">$1,000 - $2,000</option>
                                <option value="2000-3500">$2,000 - $3,500</option>
                                <option value="3500-5000">$3,500 - $5,000</option>
                                <option value="over-5000">Over $5,000</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Special Interests</label>
                        <div class="checkbox-group">
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="wildlife">
                                <i class="fas fa-check"></i>
                                <span>Wildlife Safari</span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="photography">
                                <i class="fas fa-check"></i>
                                <span>Photography</span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="adventure">
                                <i class="fas fa-check"></i>
                                <span>Adventure Sports</span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="culture">
                                <i class="fas fa-check"></i>
                                <span>Cultural Tours</span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="honeymoon">
                                <i class="fas fa-check"></i>
                                <span>Honeymoon</span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="family">
                                <i class="fas fa-check"></i>
                                <span>Family Friendly</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Additional Requests or Questions</label>
                        <textarea name="message" placeholder="Tell us more about your dream trip, any specific places you want to visit, dietary requirements, or any questions you have..."></textarea>
                    </div>

                    <div class="form-nav">
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                        <button type="button" class="btn btn-primary" onclick="nextStep()">
                            Next Step <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Contact Info -->
                <div class="form-step" data-step="3">
                    <h3 class="form-section-title">Your Details</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name <span class="required">*</span></label>
                            <input type="text" name="firstName" placeholder="John" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name <span class="required">*</span></label>
                            <input type="text" name="lastName" placeholder="Doe" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email Address <span class="required">*</span></label>
                            <input type="email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" placeholder="+1 234 567 8900">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Country of Residence</label>
                        <select name="country">
                            <option value="">Select country</option>
                            <option value="US">United States</option>
                            <option value="UK">United Kingdom</option>
                            <option value="DE">Germany</option>
                            <option value="FR">France</option>
                            <option value="AU">Australia</option>
                            <option value="CA">Canada</option>
                            <option value="ZA">South Africa</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>How did you hear about us?</label>
                        <select name="referral">
                            <option value="">Select option</option>
                            <option value="google">Google Search</option>
                            <option value="tripadvisor">TripAdvisor</option>
                            <option value="social">Social Media</option>
                            <option value="friend">Friend/Family Recommendation</option>
                            <option value="return">I've traveled with you before</option>
                            <option value="other">Other</option>
                        </select>
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

            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h3>Quote Request Received!</h3>
                <p>Thank you for your interest in Namibia! Our team will review your request and send a personalized quote to your email within 24 hours.</p>
                <p>In the meantime, feel free to explore our tours or contact us directly on WhatsApp.</p>
                <a href="index.html" class="btn btn-primary">
                    <i class="fas fa-home"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Badges -->
<section class="trust-badges">
    <div class="container">
        <div class="trust-grid">
            <div class="trust-item">
                <i class="fas fa-clock"></i>
                <h4>24-Hour Response</h4>
                <p>Get your quote within one business day</p>
            </div>
            <div class="trust-item">
                <i class="fas fa-shield-alt"></i>
                <h4>Secure Booking</h4>
                <p>Safe payment options available</p>
            </div>
            <div class="trust-item">
                <i class="fas fa-undo"></i>
                <h4>Free Cancellation</h4>
                <p>Flexible cancellation policy</p>
            </div>
            <div class="trust-item">
                <i class="fas fa-headset"></i>
                <h4>24/7 Support</h4>
                <p>Always here to help you</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="faq-grid">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>How long does it take to receive a quote?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We strive to provide all quotes within 24 hours. During peak seasons, it may take up to 48 hours. For complex multi-destination itineraries, we may need slightly longer to ensure we provide the best options.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>What is included in the quote?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Each quote includes detailed day-by-day itinerary, accommodation options with photos, all activities and transfers, meals as specified, expert guide services, and total pricing with breakdown. We pride ourselves on transparent pricing with no hidden fees.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Can I modify my quote after receiving it?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! We understand plans can change. You can request modifications to your itinerary, accommodation choices, or travel dates at any time. We'll work with you to find the perfect fit.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>What is the best time to visit Namibia?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Namibia is a year-round destination. The best time for wildlife viewing is May to October when animals congregate around waterholes. For the famous Sossusvlei dunes, any time offers spectacular views. Our team can advise on the best timing based on your specific interests.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Multi-step Form Logic
    let currentStep = 1;
    const totalSteps = 3;

    function updateProgress() {
        document.querySelectorAll('.progress-step').forEach((step, index) => {
            step.classList.remove('active', 'completed');
            if (index + 1 < currentStep) {
                step.classList.add('completed');
            } else if (index + 1 === currentStep) {
                step.classList.add('active');
            }
        });

        document.querySelectorAll('.progress-line').forEach((line, index) => {
            line.classList.toggle('active', index + 1 < currentStep);
        });

        document.querySelectorAll('.form-step').forEach((step, index) => {
            step.classList.toggle('active', index + 1 === currentStep);
        });
    }

    function nextStep() {
        const currentFormStep = document.querySelector(`.form-step[data-step="${currentStep}"]`);
        const requiredInputs = currentFormStep.querySelectorAll('[required]');
        let valid = true;

        requiredInputs.forEach(input => {
            if (!input.value) {
                valid = false;
                input.style.borderColor = '#E65100';
            } else {
                input.style.borderColor = '#eee';
            }
        });

        if (valid && currentStep < totalSteps) {
            currentStep++;
            updateProgress();
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            updateProgress();
        }
    }

    // Checkbox Toggle
    function toggleCheckbox(element) {
        element.classList.toggle('selected');
        const checkbox = element.querySelector('input');
        checkbox.checked = !checkbox.checked;
    }

    // Radio Select
    function selectRadio(element) {
        const group = element.parentElement;
        group.querySelectorAll('.radio-option').forEach(opt => opt.classList.remove('selected'));
        element.classList.add('selected');
        element.querySelector('input').checked = true;
    }

    // Form Submit
    document.getElementById('quoteForm').addEventListener('submit', function(e) {
        e.preventDefault();
        document.getElementById('quoteForm').style.display = 'none';
        document.querySelector('.form-progress-bar').style.display = 'none';
        document.getElementById('successMessage').classList.add('active');
        window.scrollTo({
            top: 300,
            behavior: 'smooth'
        });
    });

    // FAQ Toggle
    function toggleFaq(element) {
        element.parentElement.classList.toggle('active');
    }
</script>