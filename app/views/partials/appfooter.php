<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-brand">
                <a href="#" class="logo">
                    <img src="<?= SITE_ADDR . SITE_LOGO ?>" alt="<?= SITE_NAME ?>" class="img-fluid" alt="Namwel Tours & Car Rentals">
                </a>
                <div class="footer-contact pt-3">
                    <p class="mb-0"><strong>Hours:</strong> <span>Mon–Fri, 08:00–17:00</span></p>
                    <p class="mb-0"><strong>Email:</strong> <span>info@tour-safaris.namwel.com.na</span></p>
                    <p class="mb-0"><strong>Website:</strong> <span>www.namwel.com.na</span></p>
                    <p class="mb-0"><strong>Phone:</strong> <span>+264 61 244 698</span></p>
                    <p class="mb-0"><strong>Phone:</strong> <span>+264 61 244 697</span></p>
                    <p class="mb-0"><strong>Phone:</strong> <span>+264 81 212 7874 / +264 81 762 7908</span></p>
                    <p class="mb-0"><strong>Address:</strong> <span>Ara Street 7695 Dorado Valley Boîte postale 23805 Windhoek, Namibie</span></p>
                </div>
            </div>
            <div class="footer-col">
                <h4>Affiliations</h4>
                <img src="<?= SITE_ADDR . IMG_DIR . "affiliations.png" ?>" alt="Affiliations" class="img-fluid">
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="<?= get_link('index/about') ?>">About Us</a></li>
                    <li><a href="<?= get_link('index/contact') ?>">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Connect</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
                <a href="<?= get_link("payment/index") ?>" aria-label="Visa Master American Express">
                    <img src="<?= SITE_ADDR ?>assets/images/visa_master_american.png" alt="Visa Master American Express" style="width: 100%;" />
                </a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Namwel Tours & Car Rentals. All rights reserved. | <a href="<?= get_link('info/privacy') ?>">Privacy Policy</a> | <a href="<?= get_link('info/terms') ?>">Terms & Conditions</a></p>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp -->
<a href="https://wa.me/1234567890?text=Hi! I'm interested in booking a safari. Can you help me plan my trip?" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Lead Modal -->
<div class="modal fade" id="lead-modal" tabindex="-1" aria-labelledby="leadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center px-4 pb-4">
                <div class="modal-icon mb-3">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 id="leadModalLabel">Get Your Free Safari Guide</h3>
                <p>Enter your email to receive our comprehensive 2025 Safari Planning Guide with insider tips, best times to visit, and exclusive offers.</p>
                <form onsubmit="handleModalSubmit(event)">
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Your email address" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        Send Me the Guide
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Exit Intent Modal -->
<div class="modal fade" id="exit-modal" tabindex="-1" aria-labelledby="exitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center px-4 pb-4">
                <div class="exit-offer">
                    <h4 id="exitModalLabel">Wait! Don't Miss Out!</h4>
                    <p>Get <strong>5% OFF</strong> your first safari booking when you request a quote today.</p>
                </div>
                <button class="btn btn-primary w-100" data-bs-dismiss="modal"
                    onclick="document.getElementById('lead-form').scrollIntoView({behavior: 'smooth'})">
                    Claim My 5% Discount
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Welcome Modal -->
<div class="modal fade" id="welcome-modal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center px-4 pb-4">
                <div class="exit-offer">
                    <h4 id="welcomeModalLabel">Hello there! We have a welcome offer for you.</h4>
                    <p>Get <strong>5% OFF</strong> your first safari booking when you request a quote today.</p>
                </div>
                <button class="btn btn-primary w-100" data-bs-dismiss="modal"
                    onclick="document.getElementById('lead-form').scrollIntoView({behavior: 'smooth'})">
                    Claim My 5% Discount
                </button>
            </div>
        </div>
    </div>
</div>