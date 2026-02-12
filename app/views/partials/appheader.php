<?php
$controller_name = Router::$controller_name;
$page_name = Router::$page_name;
$page_action = Router::$page_action;
$page_id = Router::$page_id;
?>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="<?= SITE_ADDR ?>" class="logo d-flex align-items-center me-auto me-xl-0">
            <img src="<?= SITE_ADDR . SITE_LOGO ?>" alt="<?= SITE_NAME ?>" class="img-fluid">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li class="<?= isActiveAction(['index'], ['index'], $page_name, $page_action) ?>">
                    <a href="<?= get_link('index/index') ?>">Home</a>
                </li>

                <li class="<?= isActiveAction(['index'], ['about'], $page_name, $page_action) ?>">
                    <a href="<?= get_link('index/about') ?>">About</a>
                </li>

                <li class="dropdown <?= isActiveAction(['destinations'], ['angola','botswana','namibia','south_africa','zambia','index'], $page_name, $page_action) ?>">
                    <a href="<?= get_link('destinations/index') ?>"><span>Destinations</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="<?= get_link('destinations/namibia') ?>">Namibia</a></li>
                        <li><a href="<?= get_link('destinations/botswana') ?>">Botswana</a></li>
                        <li><a href="<?= get_link('destinations/south_africa') ?>">South Africa</a></li>
                        <li><a href="<?= get_link('destinations/zambia') ?>">Zambia</a></li>
                        <li><a href="<?= get_link('destinations/angola') ?>">Angola</a></li>
                    </ul>
                </li>

                <li class="dropdown <?= isActiveAction(['packages'], ['special_offers','honeymoon','camping','index'], $page_name, $page_action) ?>">
                    <a href="<?= get_link('packages/index') ?>"><span>Tour Packages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="<?= get_link('packages/special_offers') ?>">Special Offers</a></li>
                        <li><a href="<?= get_link('packages/honeymoon') ?>">Honeymoon</a></li>
                        <li><a href="<?= get_link('packages/camping') ?>">Camping & Overland</a></li>
                    </ul>
                </li>

                <li><a href="<?= get_link('index/gallery') ?>">Gallery</a></li>
                <li><a href="<?= get_link('info/contact') ?>">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="<?= get_link('index/quote') ?>">Request a Quote</a>
    </div>
</header>
