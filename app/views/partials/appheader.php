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
            <nav class="nav-menu notranslate">
                <a href="<?= get_link('index/index') ?>"><?= get_lang('nav_home') ?></a>

                <div class="nav-item">
                    <a href="<?= get_link('destinations/index') ?>">
                        <?= get_lang('nav_destinations') ?> <i class="fas fa-chevron-down nav-chevron"></i>
                    </a>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="<?= get_link('destinations/namibia') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>Namibia</a>
                            <a href="<?= get_link('destinations/botswana') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>Botswana</a>
                            <a href="<?= get_link('destinations/zimbabwe') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>Zimbabwe</a>
                            <a href="<?= get_link('destinations/south_africa') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>South Africa</a>
                            <a href="<?= get_link('destinations/angola') ?>"><i class="fas fa-map-marker-alt me-2 text-primary opacity-75"></i>Angola</a>
                        </div>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="<?= get_link('packages/index') ?>">
                        <?= get_lang('nav_packages') ?> <i class="fas fa-chevron-down nav-chevron"></i>
                    </a>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="<?= get_link('packages/special_offers') ?>"><i class="fas fa-tags me-2 text-primary opacity-75"></i><?= get_lang('nav_special_offers') ?></a>
                            <a href="<?= get_link('packages/honeymoon') ?>"><i class="fas fa-heart me-2 text-primary opacity-75"></i><?= get_lang('nav_honeymoon') ?></a>
                            <a href="<?= get_link('packages/camping') ?>"><i class="fas fa-campground me-2 text-primary opacity-75"></i><?= get_lang('nav_camping') ?></a>
                            <div class="nav-dropdown-divider"></div>
                            <a href="<?= get_link('index/quote') ?>"><i class="fas fa-paper-plane me-2 text-primary opacity-75"></i><?= get_lang('nav_request_quote') ?></a>
                        </div>
                    </div>
                </div>

                <a href="<?= get_link('index/gallery') ?>"><?= get_lang('nav_gallery') ?></a>
                <a href="<?= get_link('index/about') ?>"><?= get_lang('nav_about') ?></a>
                <a href="<?= get_link('index/contact') ?>"><?= get_lang('nav_contact') ?></a>
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
                        <a href="<?=  get_link('info/change_language/english') ?>" class="lang-option" data-lang="en" data-label="EN">🇬🇧 English</a>
                        <a href="<?=  get_link('info/change_language/french') ?>" class="lang-option" data-lang="fr" data-label="FR">🇫🇷 Français</a>
                        <a href="<?=  get_link('info/change_language/portuguese') ?>" class="lang-option" data-lang="pt" data-label="PT">🇵🇹 Português</a>
                        <a href="<?=  get_link('info/change_language/chinese') ?>" class="lang-option" data-lang="zh-CN" data-label="中文">🇨🇳 中文</a>
                        <a href="<?=  get_link('info/change_language/spanish') ?>" class="lang-option" data-lang="es" data-label="ES">🇪🇸 Español</a>
                    </div>
                </div>
                <div id="google_translate_element" style="display:none;"></div>

                <a href="https://wa.me/1234567890" class="whatsapp-link" target="_blank" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a class="btn btn-primary notranslate" href="<?= get_link('index/quote') ?>">
                    <i class="fas fa-map-marker-alt"></i>
                    <?= get_lang('nav_plan_my_trip') ?>
                </a>
                <button class="nav-hamburger" id="navHamburger" aria-label="Open menu">
                    <span></span><span></span><span></span>
                </button>
            </div>

            <!-- Mobile nav panel -->
            <div class="nav-mobile" id="navMobile">
                <button class="nav-mobile-close" id="navMobileClose" aria-label="Close menu">&times;</button>

                <a href="<?= get_link('index/index') ?>" class="nav-mobile-top notranslate"><?= get_lang('nav_home') ?></a>

                <div class="nav-mobile-group notranslate">
                    <div class="nav-mobile-group-title">
                        <?= get_lang('nav_destinations') ?> <i class="fas fa-chevron-down nav-chevron"></i>
                    </div>
                    <div class="nav-mobile-sub">
                        <a href="<?= get_link('destinations/angola') ?>">Angola</a>
                        <a href="<?= get_link('destinations/botswana') ?>">Botswana</a>
                        <a href="<?= get_link('destinations/namibia') ?>">Namibia</a>
                        <a href="<?= get_link('destinations/south_africa') ?>">South Africa</a>
                        <a href="<?= get_link('destinations/zimbabwe') ?>">Zimbabwe</a>
                    </div>
                </div>

                <div class="nav-mobile-group notranslate">
                    <div class="nav-mobile-group-title">
                        <?= get_lang('nav_packages') ?> <i class="fas fa-chevron-down nav-chevron"></i>
                    </div>
                    <div class="nav-mobile-sub">
                        <a href="<?= get_link('packages/special_offers') ?>"><?= get_lang('nav_special_offers') ?></a>
                        <a href="<?= get_link('packages/honeymoon') ?>"><?= get_lang('nav_honeymoon') ?></a>
                        <a href="<?= get_link('packages/camping') ?>"><?= get_lang('nav_camping') ?></a>
                        <a href="<?= get_link('index/quote') ?>"><?= get_lang('nav_request_quote') ?></a>
                    </div>
                </div>

                <a href="<?= get_link('index/gallery') ?>" class="nav-mobile-top notranslate"><?= get_lang('nav_gallery') ?></a>
                <a href="<?= get_link('index/about') ?>" class="nav-mobile-top notranslate"><?= get_lang('nav_about') ?></a>
                <a href="<?= get_link('index/contact') ?>" class="nav-mobile-top notranslate"><?= get_lang('nav_contact') ?></a>

                <div class="nav-mobile-cta">
                    <a href="<?= get_link('index/quote') ?>" class="btn btn-primary w-100 notranslate">
                        <i class="fas fa-paper-plane"></i> <?= get_lang('nav_plan_my_trip') ?>
                    </a>
                </div>
                <div class="nav-mobile-lang">
                    <a href="<?= get_link('info/change_language/english') ?>" data-label="EN">🇬🇧 EN</a>
                    <a href="<?= get_link('info/change_language/french') ?>" data-label="FR">🇫🇷 FR</a>
                    <a href="<?= get_link('info/change_language/portuguese') ?>" data-label="PT">🇵🇹 PT</a>
                    <a href="<?= get_link('info/change_language/chinese') ?>" data-label="中文">🇨🇳 中文</a>
                    <a href="<?= get_link('info/change_language/spanish') ?>" data-label="ES">🇪🇸 ES</a>
                </div>
            </div>
        </div>
    </div>
</header>