<?php
// Set url Variable From Router Class
$controller_name = Router::$controller_name;
$page_name = Router::$page_name;
$page_action = Router::$page_action;
$page_id = Router::$page_id;
$body_class = "$page_name-" . str_ireplace('list', 'index', $page_action);
$page_title = $this->get_page_title();

$comp_model = new SharedController;
$data = $comp_model->GetModel()->getOne(SqlTables::tbl_core);
$contacts = json_decode($data['contacts'], true);
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $page_title; ?></title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="facebook-domain-verification" content="xsgcdet01y0f5mcxff96i5piywvtqm" />
        <link rel="shortcut icon" href="<?php print_link(SITE_FAVICON); ?>" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <?php
        Html::page_meta('theme-color', META_THEME_COLOR);
        Html::page_meta('author', META_AUTHOR);
        Html::page_meta('keyword', META_KEYWORDS);
        Html::page_meta('description', META_DESCRIPTION);
        Html::page_meta('viewport', META_VIEWPORT);

        //Vendor CSS Files
        // Html::page_css('bootstrap.min.css');
        // Html::page_css('bootstrap-icons.css');
        // Html::page_css('aos.css');
        // Html::page_css('swiper-bundle.min.css');
        // Html::page_css('glightbox.min.css');
        //Main CSS
        Html::page_css('own-theme.css?ts=' . time());
        Html::page_js('jquery-3.3.1.min.js');
        ?>
    </head>
    <body class="index-page">
        <!-- Header -->
        <header class="header" id="header">
            <div class="container">
                <div class="header-inner">
                    <a href="#" class="logo">
                        <img src="<?= SITE_ADDR . SITE_LOGO ?>" alt="<?= SITE_NAME ?>" class="img-fluid" alt="Namwel Tours & Car Rentals">
                    </a>
                    <nav class="nav-menu">
                        <a href="<?= get_link('index/index') ?>">Home</a>
                        <a href="<?= get_link('packages') ?>">Tours</a>
                        <a href="<?= get_link('index/gallery') ?>">Gallery</a>
                        <a href="<?= get_link('index/contact') ?>">Contact</a>
                    </nav>
                    <div class="header-right">
                        <a href="https://wa.me/1234567890" class="whatsapp-link" target="_blank" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <button class="btn btn-primary" onclick="openModal('lead-modal')">
                            <i class="fas fa-map-marker-alt"></i>
                            Plan My Trip
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <?php $this->render_body(); ?>
        </main>
        <?php $this->render_view('appfooter.php'); ?>

        <!-- Preloader -->
        <div id="preloader"></div>
        <?php
        Html::page_js('bootstrap.bundle.min.js');
        Html::page_js('aos.js');
        Html::page_js('swiper-bundle.min.js');
        // Html::page_js('main.js');
        ?>
        <script>
            // Header Scroll Effect
            const header = document.getElementById('header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Countdown Timer
            function updateCountdown() {
                const endDate = new Date('2025-03-31T23:59:59').getTime();
                const now = new Date().getTime();
                const diff = endDate - now;

                if (diff > 0) {
                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    document.getElementById('days').textContent = days.toString().padStart(2, '0');
                    document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                    document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                    document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
                }
            }

            setInterval(updateCountdown, 1000);
            updateCountdown();

            // Testimonial Slider
            const slides = document.querySelectorAll('.testimonial-slide');
            const dots = document.querySelectorAll('.testimonial-dot');
            let currentSlide = 0;

            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));

                slides[index].classList.add('active');
                dots[index].classList.add('active');
                currentSlide = index;
            }

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => showSlide(index));
            });

            setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }, 5000);

            // Multi-step Form
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
                const inputs = currentFormStep.querySelectorAll('[required]');
                let valid = true;

                inputs.forEach(input => {
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

            function selectRadio(element) {
                document.querySelectorAll('.radio-option').forEach(opt => opt.classList.remove('selected'));
                element.classList.add('selected');
                element.querySelector('input').checked = true;
            }

            function handleSubmit(event) {
                event.preventDefault();
                document.querySelector('.form-header h2').textContent = 'Thank You!';
                document.querySelector('.form-header p').textContent = 'We\'ll be in touch within 24 hours with your personalized itinerary.';
                document.getElementById('leadForm').innerHTML = `
                    <div style="text-align: center; padding: 40px 0;">
                        <i class="fas fa-check-circle" style="font-size: 60px; color: var(--bush-green);"></i>
                        <p style="margin-top: 20px; font-size: 18px;">Check your inbox for next steps!</p>
                    </div>
                `;
            }

            // Modal Functions
            function openModal(modalId) {
                document.getElementById(modalId).classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeModal(modalId) {
                document.getElementById(modalId).classList.remove('active');
                document.body.style.overflow = 'auto';
            }

            function handleModalSubmit(event) {
                event.preventDefault();
                closeModal('lead-modal');
                openModal('success-modal');
            }

            // Exit Intent
            let exitIntentTriggered = false;
            document.addEventListener('mouseleave', (e) => {
                if (e.clientY <= 0 && !exitIntentTriggered) {
                    exitIntentTriggered = true;
                    setTimeout(() => {
                        openModal('exit-modal');
                    }, 500);
                }
            });

            // Scroll Animations
            const fadeElements = document.querySelectorAll('.fade-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {threshold: 0.1});

            fadeElements.forEach(el => observer.observe(el));

            // Close modal on outside click
            document.querySelectorAll('.modal-overlay').forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                openModal('welcome-modal');
            });
        </script>
    </body>
</html>