<?php

?>
<!-- How It Works -->
<section class="how-it-works">
    <div class="container">
        <div class="section-header">
            <h2><?= get_lang('quote_how_works') ?></h2>
            <p><?= get_lang('quote_how_desc') ?></p>
        </div>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <h3><?= get_lang('quote_step1') ?></h3>
                <p><?= get_lang('quote_step1_desc') ?></p>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <h3><?= get_lang('quote_step2') ?></h3>
                <p><?= get_lang('quote_step2_desc') ?></p>
            </div>
            <div class="step-card">
                <div class="step-number">3</div>
                <h3><?= get_lang('quote_step3') ?></h3>
                <p><?= get_lang('quote_step3_desc') ?></p>
            </div>
            <div class="step-card">
                <div class="step-number">4</div>
                <h3><?= get_lang('quote_step4') ?></h3>
                <p><?= get_lang('quote_step4_desc') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Quote Form -->
<section class="quote-section">
    <div class="container">
        <div class="quote-container">
            <div class="form-header">
                <h2><?= get_lang('quote_form_title') ?></h2>
                <p><?= get_lang('quote_form_desc') ?></p>
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

            <form id="quoteForm" method="POST" action="<?= get_link('index/quote?csrf_token=' . Csrf::$token) ?>">
                <!-- Step 1: Trip Details -->
                <div class="form-step active" data-step="1">
                    <h3 class="form-section-title"><?= get_lang('quote_trip_prefs') ?></h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label><?= get_lang('quote_destinations_label') ?> <span class="required">*</span></label>
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
                            <label><?= get_lang('quote_trip_type') ?> <span class="required">*</span></label>
                            <div class="radio-group">
                                <label class="radio-option" onclick="selectRadio(this)">
                                    <input type="radio" name="tripType" value="guided-tour" checked>
                                    <i class="fas fa-user-tie"></i>
                                    <span><?= get_lang('quote_guided_tour') ?></span>
                                </label>
                                <label class="radio-option" onclick="selectRadio(this)">
                                    <input type="radio" name="tripType" value="self-drive">
                                    <i class="fas fa-car"></i>
                                    <span><?= get_lang('quote_self_drive') ?></span>
                                </label>
                                <label class="radio-option" onclick="selectRadio(this)">
                                    <input type="radio" name="tripType" value="car-rental">
                                    <i class="fas fa-key"></i>
                                    <span><?= get_lang('quote_car_rental') ?></span>
                                </label>
                                <label class="radio-option" onclick="selectRadio(this)">
                                    <input type="radio" name="tripType" value="custom">
                                    <i class="fas fa-magic"></i>
                                    <span><?= get_lang('quote_custom') ?></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label><?= get_lang('quote_accommodation') ?></label>
                            <select name="accommodation">
                                <option value=""><?= get_lang('quote_accommodation') ?></option>
                                <option value="budget"><?= get_lang('quote_budget_camping') ?></option>
                                <option value="mid-range"><?= get_lang('quote_mid_range') ?></option>
                                <option value="luxury"><?= get_lang('quote_luxury') ?></option>
                                <option value="ultra-luxury"><?= get_lang('quote_ultra') ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?= get_lang('quote_travelers') ?> <span class="required">*</span></label>
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
                            <?= get_lang('quote_btn_next') ?> <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Dates & Budget -->
                <div class="form-step" data-step="2">
                    <h3 class="form-section-title"><?= get_lang('quote_dates_title') ?></h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label><?= get_lang('quote_start_date') ?></label>
                            <input type="date" name="startDate">
                        </div>
                        <div class="form-group">
                            <label><?= get_lang('quote_end_date') ?></label>
                            <input type="date" name="endDate">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label><?= get_lang('quote_flexibility') ?></label>
                            <select name="dateFlexibility">
                                <option value=""><?= get_lang('quote_flexibility') ?></option>
                                <option value="strict"><?= get_lang('quote_strict') ?></option>
                                <option value="flexible"><?= get_lang('quote_flexible') ?></option>
                                <option value="very-flexible"><?= get_lang('quote_very_flexible') ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?= get_lang('quote_budget') ?></label>
                            <select name="budget">
                                <option value=""><?= get_lang('quote_budget') ?></option>
                                <option value="under-1000">Under $1,000</option>
                                <option value="1000-2000">$1,000 - $2,000</option>
                                <option value="2000-3500">$2,000 - $3,500</option>
                                <option value="3500-5000">$3,500 - $5,000</option>
                                <option value="over-5000">Over $5,000</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?= get_lang('quote_interests') ?></label>
                        <div class="checkbox-group">
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="wildlife">
                                <i class="fas fa-check"></i>
                                <span><?= get_lang('quote_wildlife') ?></span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="photography">
                                <i class="fas fa-check"></i>
                                <span><?= get_lang('quote_photography') ?></span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="adventure">
                                <i class="fas fa-check"></i>
                                <span><?= get_lang('quote_adventure') ?></span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="culture">
                                <i class="fas fa-check"></i>
                                <span><?= get_lang('quote_culture') ?></span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="honeymoon">
                                <i class="fas fa-check"></i>
                                <span><?= get_lang('quote_honeymoon_interest') ?></span>
                            </label>
                            <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                <input type="checkbox" name="interest" value="family">
                                <i class="fas fa-check"></i>
                                <span><?= get_lang('quote_family') ?></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?= get_lang('quote_additional') ?></label>
                        <textarea name="message" placeholder="Tell us more about your dream trip, any specific places you want to visit, dietary requirements, or any questions you have..."></textarea>
                    </div>

                    <div class="form-nav">
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">
                            <i class="fas fa-arrow-left"></i> <?= get_lang('btn_back') ?>
                        </button>
                        <button type="button" class="btn btn-primary" onclick="nextStep()">
                            <?= get_lang('quote_btn_next') ?> <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Contact Info -->
                <div class="form-step" data-step="3">
                    <h3 class="form-section-title"><?= get_lang('quote_details_title') ?></h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label><?= get_lang('quote_first_name') ?> <span class="required">*</span></label>
                            <input type="text" name="firstName" placeholder="John" required>
                        </div>
                        <div class="form-group">
                            <label><?= get_lang('quote_last_name') ?> <span class="required">*</span></label>
                            <input type="text" name="lastName" placeholder="Doe" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label><?= get_lang('quote_email') ?> <span class="required">*</span></label>
                            <input type="email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="form-group">
                            <label><?= get_lang('quote_phone') ?></label>
                            <input type="tel" name="phone" placeholder="+1 234 567 8900">
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?= get_lang('quote_country') ?></label>
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
                        <label><?= get_lang('quote_referral') ?></label>
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
                            <i class="fas fa-arrow-left"></i> <?= get_lang('btn_back') ?>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> <?= get_lang('quote_btn_submit') ?>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h3><?= get_lang('quote_success_title') ?></h3>
                <p><?= get_lang('quote_success_desc') ?></p>
                <p><?= get_lang('quote_success_explore') ?></p>
                <a href="<?= get_link('index/index') ?>" class="btn btn-primary">
                    <i class="fas fa-home"></i> <?= get_lang('quote_back_home') ?>
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
                <h4><?= get_lang('quote_24hr') ?></h4>
                <p><?= get_lang('quote_24hr_desc') ?></p>
            </div>
            <div class="trust-item">
                <i class="fas fa-shield-alt"></i>
                <h4><?= get_lang('quote_secure') ?></h4>
                <p><?= get_lang('quote_secure_desc') ?></p>
            </div>
            <div class="trust-item">
                <i class="fas fa-undo"></i>
                <h4><?= get_lang('quote_cancel') ?></h4>
                <p><?= get_lang('quote_cancel_desc') ?></p>
            </div>
            <div class="trust-item">
                <i class="fas fa-headset"></i>
                <h4><?= get_lang('quote_support') ?></h4>
                <p><?= get_lang('quote_support_desc') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-header">
            <h2><?= get_lang('quote_faq_title') ?></h2>
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

    // Form Submit — AJAX POST
    document.getElementById('quoteForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const submitBtn = form.querySelector('[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending…';

        const data = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            body: data
        })
        .then(r => r.json())
        .then(res => {
            if (res.success) {
                form.style.display = 'none';
                document.querySelector('.form-progress-bar').style.display = 'none';
                document.getElementById('successMessage').classList.add('active');
                window.scrollTo({ top: 300, behavior: 'smooth' });
            } else {
                // Show error inline above the nav buttons
                let alert = form.querySelector('.quote-error-alert');
                if (!alert) {
                    alert = document.createElement('div');
                    alert.className = 'alert alert-danger quote-error-alert mt-3';
                    form.querySelector('.form-step.active .form-nav').before(alert);
                }
                alert.textContent = res.message || 'Something went wrong. Please try again.';
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        })
        .catch(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });

    // FAQ Toggle
    function toggleFaq(element) {
        element.parentElement.classList.toggle('active');
    }
</script>