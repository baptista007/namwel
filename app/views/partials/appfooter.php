<footer id="footer" class="footer position-relative dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="<?= get_link('index/index') ?>" class="d-flex align-items-center">
                    <span class="sitename"><?= SITE_NAME ?></span>
                </a>
                <div class="footer-contact pt-3">
                    <p class="mb-0"><strong>Hours:</strong> <span>Mon–Fri, 08:00–17:00</span></p>
                    <p class="mb-0"><strong>Email:</strong> <span>info@tour-safaris.namwel.com.na</span></p>
                    <p class="mb-0"><strong>Website:</strong> <span>www.namwel.com.na</span></p>
                    <p class="mb-0"><strong>Phone:</strong> <span>+264 61 244 698</span></p>
                    <p class="mb-0"><strong>Phone:</strong> <span>+264 61 244 697</span></p>
                    <p class="mb-0"><strong>Phone:</strong> <span>+264 81 212 7874   / +264 81 762 7908</span></p>
                    <p class="mb-0"><strong>Address:</strong> <span>Ara Street 7695 Dorado Valley Boîte postale 23805 Windhoek, Namibie</span></p>
                </div>

                <div class="social-links d-flex mt-4">
                    <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Company</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= get_link('index/about') ?>">About</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= get_link('info/contact') ?>">Contact</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= get_link('info/terms_and_conditions') ?>">Terms</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="<?= get_link('info/privacy_policy') ?>">Privacy</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 footer-links">
                <h4>Affiliates</h4>
                <img src="<?= SITE_ADDR ?>assets/images/affiliations.png" alt="Affiliations" class="img-fluid" />
            </div>

            <div class="col-lg-3 col-md-12 footer-links">
                <h4>Payment Modes</h4>
                <a href="<?= get_link("payment/index") ?>" aria-label="Visa Master American Express">
                    <img src="<?= SITE_ADDR ?>assets/images/visa_master_american.png" alt="Visa Master American Express" class="img-fluid" />
                </a>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"><?= SITE_NAME ?></strong> <span>All Rights Reserved</span></p>
    </div>

</footer>
