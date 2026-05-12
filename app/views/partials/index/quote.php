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
                                    <span><?= get_lang('quote_dest_sossusvlei') ?></span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="etosha">
                                    <i class="fas fa-check"></i>
                                    <span><?= get_lang('quote_dest_etosha') ?></span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="swakopmund">
                                    <i class="fas fa-check"></i>
                                    <span><?= get_lang('quote_dest_swakopmund') ?></span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="fish-river">
                                    <i class="fas fa-check"></i>
                                    <span><?= get_lang('quote_dest_fish_river') ?></span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="skeleton-coast">
                                    <i class="fas fa-check"></i>
                                    <span><?= get_lang('quote_dest_skeleton_coast') ?></span>
                                </label>
                                <label class="checkbox-option" onclick="toggleCheckbox(this)">
                                    <input type="checkbox" name="destination" value="windhoek">
                                    <i class="fas fa-check"></i>
                                    <span><?= get_lang('quote_dest_windhoek') ?></span>
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
                                <option value=""><?= get_lang('form_select_travelers') ?></option>
                                <option value="1">1 <?= get_lang('form_guest') ?></option>
                                <option value="2">2 <?= get_lang('form_guests') ?></option>
                                <option value="3">3 <?= get_lang('form_guests') ?></option>
                                <option value="4">4 <?= get_lang('form_guests') ?></option>
                                <option value="5">5 <?= get_lang('form_guests') ?></option>
                                <option value="6">6 <?= get_lang('form_guests') ?></option>
                                <option value="7+">7+ <?= get_lang('form_guests') ?></option>
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
                                <option value="under-1000"><?= get_lang('quote_budget_under1000') ?></option>
                                <option value="1000-2000"><?= get_lang('quote_budget_1000_2000') ?></option>
                                <option value="2000-3500"><?= get_lang('quote_budget_2000_3500') ?></option>
                                <option value="3500-5000"><?= get_lang('quote_budget_3500_5000') ?></option>
                                <option value="over-5000"><?= get_lang('quote_budget_over5000') ?></option>
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
                        <textarea name="message" placeholder="<?= get_lang('quote_additional_placeholder') ?>"></textarea>
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
                            <option value=""><?= get_lang('quote_select_country') ?></option>
                            <option value="US"><?= get_lang('quote_country_us') ?></option>
                            <option value="UK"><?= get_lang('quote_country_uk') ?></option>
                            <option value="DE"><?= get_lang('quote_country_de') ?></option>
                            <option value="FR"><?= get_lang('quote_country_fr') ?></option>
                            <option value="AU"><?= get_lang('quote_country_au') ?></option>
                            <option value="CA"><?= get_lang('quote_country_ca') ?></option>
                            <option value="ZA"><?= get_lang('quote_country_za') ?></option>
                            <option value="other"><?= get_lang('quote_country_other') ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?= get_lang('quote_referral') ?></label>
                        <select name="referral">
                            <option value=""><?= get_lang('quote_select_option') ?></option>
                            <option value="google"><?= get_lang('quote_referral_google') ?></option>
                            <option value="tripadvisor"><?= get_lang('quote_referral_tripadvisor') ?></option>
                            <option value="social"><?= get_lang('quote_referral_social') ?></option>
                            <option value="friend"><?= get_lang('quote_referral_friend') ?></option>
                            <option value="return"><?= get_lang('quote_referral_return') ?></option>
                            <option value="other"><?= get_lang('quote_referral_other') ?></option>
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
                    <span><?= get_lang('quote_faq1_q') ?></span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p><?= get_lang('quote_faq1_a') ?></p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span><?= get_lang('quote_faq2_q') ?></span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p><?= get_lang('quote_faq2_a') ?></p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span><?= get_lang('quote_faq3_q') ?></span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p><?= get_lang('quote_faq3_a') ?></p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span><?= get_lang('quote_faq4_q') ?></span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p><?= get_lang('quote_faq4_a') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
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

    function toggleCheckbox(element) {
        element.classList.toggle('selected');
        const checkbox = element.querySelector('input');
        checkbox.checked = !checkbox.checked;
    }

    function selectRadio(element) {
        const group = element.parentElement;
        group.querySelectorAll('.radio-option').forEach(opt => opt.classList.remove('selected'));
        element.classList.add('selected');
        element.querySelector('input').checked = true;
    }

    document.getElementById('quoteForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const submitBtn = form.querySelector('[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span><?= get_lang('quote_sending') ?>';

        const data = new FormData(form);

        fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: data
            })
            .then(r => r.json())
            .then(res => {
                if (res.success) {
                    form.style.display = 'none';
                    document.querySelector('.form-progress-bar').style.display = 'none';
                    document.getElementById('successMessage').classList.add('active');
                    window.scrollTo({
                        top: 300,
                        behavior: 'smooth'
                    });
                } else {
                    let alert = form.querySelector('.quote-error-alert');
                    if (!alert) {
                        alert = document.createElement('div');
                        alert.className = 'alert alert-danger quote-error-alert mt-3';
                        form.querySelector('.form-step.active .form-nav').before(alert);
                    }
                    alert.textContent = res.message || '<?= get_lang('quote_error_generic') ?>';
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            })
            .catch(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
    });

    function toggleFaq(element) {
        element.parentElement.classList.toggle('active');
    }
</script>