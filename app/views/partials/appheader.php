<?php
$controller_name = Router::$controller_name;
$page_name = Router::$page_name;
$page_action = Router::$page_action;
$page_id = Router::$page_id;
?>
<header class="header" id="header">
    <div class="container">
        <div class="header-inner">
            <a href="#" class="logo">
                <img src="<?= SITE_ADDR . SITE_LOGO ?>" alt="<?= SITE_NAME ?>" class="img-fluid" alt="Namwel Tours & Car Rentals">
            </a>
            <nav class="nav-menu">
                <a href="<?= get_link('index/index') ?>">Home</a>

                <div class="nav-item">
                    <a href="<?= get_link('destinations/index') ?>">
                        Destinations <i class="fas fa-chevron-down nav-chevron"></i>
                    </a>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="<?= get_link('destinations/angola') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>Angola</a>
                            <a href="<?= get_link('destinations/botswana') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>Botswana</a>
                            <a href="<?= get_link('destinations/namibia') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>Namibia</a>
                            <a href="<?= get_link('destinations/south_africa') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>South Africa</a>
                            <a href="<?= get_link('destinations/zimbabwe') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>Zimbabwe</a>
                        </div>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="<?= get_link('packages/index') ?>">
                        Packages <i class="fas fa-chevron-down nav-chevron"></i>
                    </a>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="<?= get_link('packages/special_offers') ?>"><i class="fas fa-tags me-2 text-primary opacity-75"></i>Special Offers</a>
                            <a href="<?= get_link('packages/honeymoon') ?>"><i class="fas fa-heart me-2 text-primary opacity-75"></i>Honeymoon</a>
                            <a href="<?= get_link('packages/camping') ?>"><i class="fas fa-campground me-2 text-primary opacity-75"></i>Camping &amp; Overland</a>
                            <div class="nav-dropdown-divider"></div>
                            <a href="<?= get_link('index/quote') ?>"><i class="fas fa-paper-plane me-2 text-primary opacity-75"></i>Request a Quote</a>
                        </div>
                    </div>
                </div>

                <a href="<?= get_link('index/gallery') ?>">Gallery</a>
                <a href="<?= get_link('index/about') ?>">About</a>
                <a href="<?= get_link('index/contact') ?>">Contact</a>
            </nav>

            <div class="header-right">

                <!-- Language Switcher -->
                <div class="lang-switcher" id="langSwitcher">
                    <button class="lang-btn" id="langToggle" aria-label="Select language">
                        <i class="fas fa-globe"></i>
                        <span id="langCurrent">EN</span>
                        <i class="fas fa-chevron-down lang-chevron"></i>
                    </button>
                    <div class="lang-dropdown" id="langDropdown">
                        <button class="lang-option" data-lang="en" data-label="EN">🇬🇧 English</button>
                        <button class="lang-option" data-lang="fr" data-label="FR">🇫🇷 Français</button>
                        <button class="lang-option" data-lang="pt" data-label="PT">🇵🇹 Português</button>
                        <button class="lang-option" data-lang="zh-CN" data-label="中文">🇨🇳 中文</button>
                        <button class="lang-option" data-lang="es" data-label="ES">🇪🇸 Español</button>
                    </div>
                </div>
                <div id="google_translate_element" style="display:none;"></div>

                <a href="https://wa.me/1234567890" class="whatsapp-link" target="_blank" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a class="btn btn-primary" href="<?= get_link('index/quote') ?>">
                    <i class="fas fa-map-marker-alt"></i>
                    Plan My Trip
                </a>
                <button class="nav-hamburger" id="navHamburger" aria-label="Open menu">
                    <span></span><span></span><span></span>
                </button>
            </div>

            <!-- Mobile nav panel -->
            <div class="nav-mobile" id="navMobile">
                <button class="nav-mobile-close" id="navMobileClose" aria-label="Close menu">&times;</button>

                <a href="<?= get_link('index/index') ?>" class="nav-mobile-top">Home</a>

                <div class="nav-mobile-group">
                    <div class="nav-mobile-group-title">
                        Destinations <i class="fas fa-chevron-down nav-chevron"></i>
                    </div>
                    <div class="nav-mobile-sub">
                        <a href="<?= get_link('destinations/angola') ?>">Angola</a>
                        <a href="<?= get_link('destinations/botswana') ?>">Botswana</a>
                        <a href="<?= get_link('destinations/namibia') ?>">Namibia</a>
                        <a href="<?= get_link('destinations/south_africa') ?>">South Africa</a>
                        <a href="<?= get_link('destinations/zimbabwe') ?>">Zimbabwe</a>
                    </div>
                </div>

                <div class="nav-mobile-group">
                    <div class="nav-mobile-group-title">
                        Packages <i class="fas fa-chevron-down nav-chevron"></i>
                    </div>
                    <div class="nav-mobile-sub">
                        <a href="<?= get_link('packages/special_offers') ?>">Special Offers</a>
                        <a href="<?= get_link('packages/honeymoon') ?>">Honeymoon</a>
                        <a href="<?= get_link('packages/camping') ?>">Camping &amp; Overland</a>
                        <a href="<?= get_link('index/quote') ?>">Request a Quote</a>
                    </div>
                </div>

                <a href="<?= get_link('index/gallery') ?>" class="nav-mobile-top">Gallery</a>
                <a href="<?= get_link('index/about') ?>" class="nav-mobile-top">About</a>
                <a href="<?= get_link('index/contact') ?>" class="nav-mobile-top">Contact</a>

                <div class="nav-mobile-cta">
                    <a href="<?= get_link('index/quote') ?>" class="btn btn-primary w-100">
                        <i class="fas fa-paper-plane"></i> Plan My Trip
                    </a>
                </div>
                <div class="nav-mobile-lang">
                    <button onclick="setGoogleTranslateLang('en')" data-label="EN">🇬🇧 EN</button>
                    <button onclick="setGoogleTranslateLang('fr')" data-label="FR">🇫🇷 FR</button>
                    <button onclick="setGoogleTranslateLang('pt')" data-label="PT">🇵🇹 PT</button>
                    <button onclick="setGoogleTranslateLang('zh-CN')" data-label="中文">🇨🇳 中文</button>
                    <button onclick="setGoogleTranslateLang('es')" data-label="ES">🇪🇸 ES</button>
                </div>
            </div>
        </div>
    </div>
</header>