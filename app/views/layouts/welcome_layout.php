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

// Load active guaranteed trips for the homepage popup (max 3, soonest first)
$_gdb = $comp_model->GetModel();
$_gdb->where("status", 1);
$_gdb->orderBy("departure_date", "ASC");
$_gtrips = $_gdb->get(SqlTables::tbl_guaranteed_trip, [0, 3], [
    "id", "title", "destination", "departure_date", "duration",
    "price", "price_currency", "price_label", "spots_left",
    "spots_available", "badge", "cover_image"
]);
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo SITE_NAME . ' - ' . $page_title; ?></title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="facebook-domain-verification" content="xsgcdet01y0f5mcxff96i5piywvtqm" />
    <link rel="shortcut icon" href="<?php print_link(SITE_FAVICON); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php
    Html::page_meta('theme-color', META_THEME_COLOR);
    Html::page_meta('author', META_AUTHOR);
    Html::page_meta('keyword', META_KEYWORDS);
    Html::page_meta('description', META_DESCRIPTION);
    Html::page_meta('viewport', META_VIEWPORT);

    Html::page_css('fontawesome.all.min.css');
    Html::page_css('bootstrap.min.css');
    Html::page_css('own-theme.css?ts=' . time());
    Html::page_js('jquery-3.3.1.min.js');
    ?>
</head>

<body class="index-page">
    <!-- Header -->
    <?php $this->render_view('appheader.php'); ?>
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

    <?php if (!empty($_gtrips)): ?>
    <!-- ── Guaranteed Trips Popup ─────────────────────────────────────────── -->
    <style>
    .gtrip-modal-header {
        background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 60%, #E65100 100%);
        padding: 24px 24px 20px;
        position: relative;
        color: #fff;
        flex-shrink: 0;
    }
    .gtrip-modal-header-inner { padding-right: 44px; }
    .gtrip-modal-eyebrow {
        display: inline-block;
        background: rgba(255,255,255,.18);
        border: 1px solid rgba(255,255,255,.3);
        border-radius: 50px;
        padding: 3px 14px;
        font-size: .72rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }
    .gtrip-modal-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: 4px;
        color: #fff;
    }
    .gtrip-modal-subtitle { opacity: .82; font-size: .88rem; margin: 0; }
    .gtrip-modal-close {
        position: absolute;
        top: 14px; right: 14px;
        background: rgba(255,255,255,.2);
        border: none;
        color: #fff;
        width: 34px; height: 34px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        font-size: .9rem;
        transition: background .2s;
        line-height: 1;
    }
    .gtrip-modal-close:hover { background: rgba(255,255,255,.38); }

    /* Scrollable body */
    #gtrip-body { overflow-y: auto; flex: 1; }

    /* Trip row */
    .gtrip-modal-trip {
        display: flex;
        align-items: stretch;
        border-bottom: 1px solid #f0f0f0;
    }
    .gtrip-modal-trip:last-child { border-bottom: none; }
    .gtrip-modal-trip--urgent { border-left: 3px solid #C62828; }
    .gtrip-modal-trip-img-wrap {
        position: relative;
        width: 110px; min-width: 110px;
        overflow: hidden; flex-shrink: 0;
    }
    .gtrip-modal-trip-img-wrap img { width:100%; height:100%; object-fit:cover; display:block; }
    .gtrip-modal-badge {
        position: absolute; top: 8px; left: 8px;
        color: #fff; font-size: .62rem; font-weight: 700;
        letter-spacing: .6px; text-transform: uppercase;
        padding: 3px 8px; border-radius: 20px;
    }
    .gtrip-modal-trip-body { flex:1; padding: 14px 16px; min-width: 0; }
    .gtrip-modal-destination {
        font-size: .7rem; font-weight: 600; color: #E65100;
        text-transform: uppercase; letter-spacing: .5px; margin-bottom: 2px;
    }
    .gtrip-modal-trip-title {
        font-family: 'Playfair Display', serif;
        font-size: .98rem; font-weight: 700; margin-bottom: 5px;
        line-height: 1.25; white-space: nowrap;
        overflow: hidden; text-overflow: ellipsis;
    }
    .gtrip-modal-meta { display:flex; flex-wrap:wrap; gap:10px; font-size:.76rem; color:#555; margin-bottom:5px; }
    .gtrip-modal-spots { font-size:.78rem; font-weight:600; margin:0; }
    .gtrip-modal-trip-cta {
        display:flex; flex-direction:column; align-items:center;
        justify-content:center; gap:8px; padding:14px 16px;
        min-width:120px; border-left:1px solid #f0f0f0; flex-shrink:0;
    }
    .gtrip-modal-price { font-weight:700; font-size:.9rem; color:#1B5E20; text-align:center; }
    .gtrip-modal-footer {
        display:flex; align-items:center; justify-content:space-between;
        padding:12px 20px; border-top:1px solid #eee; background:#fafafa; flex-shrink:0;
    }
    .gtrip-dismiss-link {
        background:none; border:none; color:#aaa; font-size:.82rem;
        cursor:pointer; text-decoration:underline; padding:0;
    }
    .gtrip-dismiss-link:hover { color:#666; }
    @media(max-width:480px) {
        .gtrip-modal-trip { flex-wrap:wrap; }
        .gtrip-modal-trip-img-wrap { width:100%; min-width:100%; height:110px; }
        .gtrip-modal-trip-cta { flex-direction:row; border-left:none; border-top:1px solid #f0f0f0; width:100%; justify-content:space-between; }
    }
    </style>

    <div class="modal fade" id="gtripModal" tabindex="-1" aria-labelledby="gtrip-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content border-0 rounded-4 overflow-hidden">

                <div class="modal-header gtrip-modal-header">
                    <div class="gtrip-modal-header-inner">
                        <div class="gtrip-modal-eyebrow">
                            <i class="fas fa-calendar-check me-1"></i><?= get_lang('gtrip_hero_badge') ?>
                        </div>
                        <h5 class="modal-title gtrip-modal-title" id="gtrip-title">
                            <?= get_lang('gtrip_modal_title') . ' ' . date('Y') ?>
                        </h5>
                        <p class="gtrip-modal-subtitle mb-0">
                            <?= get_lang('gtrip_modal_subtitle') ?>
                        </p>
                    </div>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="gtrip-body">
                    <?php
                    $badge_bg = [
                        'Guaranteed' => '#2E7D32',
                        'Last Spots' => '#C62828',
                        'Sold Out'   => '#424242',
                        'Limited'    => '#E65100',
                        'New'        => '#1565C0',
                    ];

                    foreach ($_gtrips as $t):
                        $badge       = $t['badge'] ?? 'Guaranteed';
                        $bg          = $badge_bg[$badge] ?? '#2E7D32';
                        $spots_left  = intval($t['spots_left']);
                        $spots_avail = intval($t['spots_available']);
                        $urgency     = $spots_left > 0 && $spots_left <= 4;
                        $sold_out    = $badge === 'Sold Out';
                        $dep_label   = !empty($t['departure_date']) ? date('d M Y', strtotime($t['departure_date'])) : null;

                        $img_url = !empty($t['cover_image'])
                            ? SITE_ADDR . UPLOAD_FILE_DIR . htmlspecialchars($t['cover_image'])
                            : SITE_ADDR . 'assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg';

                        if (!empty($t['price_label'])) {
                            $price_display = htmlspecialchars($t['price_label']);
                        } elseif (!empty($t['price']) && $t['price'] > 0) {
                            $price_display = htmlspecialchars($t['price_currency'] ?? 'USD') . ' ' . number_format($t['price'], 0);
                        } else {
                            $price_display = get_lang('pkgs_on_request');
                        }
                    ?>

                    <div class="card mb-3 border-0 shadow-sm gtrip-modal-trip<?= $urgency ? ' gtrip-modal-trip--urgent' : '' ?>">
                        <div class="row g-0 align-items-stretch">

                            <div class="col-md-4 position-relative gtrip-modal-trip-img-wrap">
                                <img src="<?= $img_url ?>"
                                    class="img-fluid h-100 w-100 object-fit-cover"
                                    alt="<?= htmlspecialchars(html_entity_decode($t['title'])) ?>">

                                <span class="badge position-absolute top-0 start-0 m-3 gtrip-modal-badge"
                                    style="background:<?= $bg ?>">
                                    <i class="fas fa-check-circle me-1"></i><?= htmlspecialchars($badge) ?>
                                </span>
                            </div>

                            <div class="col-md-5">
                                <div class="card-body gtrip-modal-trip-body">
                                    <?php if (!empty($t['destination'])): ?>
                                        <p class="gtrip-modal-destination mb-2">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            <?= htmlspecialchars($t['destination']) ?>
                                        </p>
                                    <?php endif; ?>

                                    <h5 class="card-title gtrip-modal-trip-title">
                                        <?= html_entity_decode($t['title']) ?>
                                    </h5>

                                    <div class="gtrip-modal-meta d-flex flex-wrap gap-3 mb-2">
                                        <?php if ($dep_label): ?>
                                            <span>
                                                <i class="fas fa-plane-departure me-1"></i><?= $dep_label ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if (!empty($t['duration'])): ?>
                                            <span>
                                                <i class="fas fa-clock me-1"></i><?= htmlspecialchars($t['duration']) ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($spots_avail > 0): ?>
                                        <p class="gtrip-modal-spots mb-0 <?= $urgency ? 'text-danger' : 'text-muted' ?>">
                                            <?php if ($sold_out): ?>
                                                <i class="fas fa-ban me-1"></i><?= get_lang('gtrip_sold_out') ?>
                                            <?php elseif ($urgency): ?>
                                                <i class="fas fa-fire me-1"></i><?= sprintf(get_lang('gtrip_spots_left_n'), $spots_left) ?>
                                            <?php else: ?>
                                                <i class="fas fa-users me-1"></i><?= sprintf(get_lang('gtrip_spots_of'), $spots_left, $spots_avail) ?>
                                            <?php endif; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-3 d-flex align-items-center justify-content-md-end">
                                <div class="card-body text-md-end gtrip-modal-trip-cta">
                                    <div class="gtrip-modal-price fw-bold mb-2">
                                        <?= $price_display ?>
                                    </div>

                                    <?php if (!$sold_out): ?>
                                        <a href="<?= get_link('index/quote') ?>" class="btn btn-primary btn-sm text-nowrap">
                                            <i class="fas fa-paper-plane me-1"></i><?= get_lang('gtrip_book_now') ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>

                <div class="modal-footer gtrip-modal-footer">
                    <a href="<?= get_link('trips') ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-star me-1"></i><?= get_lang('gtrip_modal_view_all') ?>
                    </a>

                    <div class="d-flex align-items-center gap-3">
                        <button type="button" class="btn btn-link text-decoration-none gtrip-dismiss-link" data-bs-dismiss="modal">
                            <?= get_lang('gtrip_modal_dismiss') ?>
                        </button>
                        <button type="button" class="btn btn-link text-decoration-none gtrip-dismiss-link text-danger" id="gtripNoShow">
                            <?= get_lang('gtrip_modal_no_show') ?>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
    (function () {
        var STORAGE_KEY = 'gtripHideUntil';
        var hideUntil = parseInt(localStorage.getItem(STORAGE_KEY) || '0', 10);
        if (Date.now() < hideUntil) return;

        document.addEventListener('DOMContentLoaded', function () {
            var el = document.getElementById('gtripModal');
            if (!el) return;
            var modal = new bootstrap.Modal(el);
            setTimeout(function () { modal.show(); }, 1800);

            document.getElementById('gtripNoShow').addEventListener('click', function () {
                localStorage.setItem(STORAGE_KEY, Date.now() + 30 * 24 * 60 * 60 * 1000);
                modal.hide();
            });
        });
    })();
    </script>
    <?php endif; ?>

</body>

</html>
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

    // Mobile nav open/close
    const hamburger = document.getElementById('navHamburger');
    const mobileNav = document.getElementById('navMobile');
    const mobileClose = document.getElementById('navMobileClose');

    function openMobileNav() {
        mobileNav.classList.add('open');
        hamburger.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileNav() {
        mobileNav.classList.remove('open');
        hamburger.classList.remove('open');
        document.body.style.overflow = '';
    }

    hamburger.addEventListener('click', openMobileNav);
    mobileClose.addEventListener('click', closeMobileNav);

    // Mobile accordion groups
    document.querySelectorAll('.nav-mobile-group-title').forEach(title => {
        title.addEventListener('click', () => {
            title.parentElement.classList.toggle('open');
        });
    });

    // Close mobile nav on link click
    document.querySelectorAll('.nav-mobile a, .nav-mobile-cta a').forEach(link => {
        link.addEventListener('click', closeMobileNav);
    });

    // Language switcher UI
    (function() {
        var toggle = document.getElementById('langToggle');
        var dropdown = document.getElementById('langDropdown');
        var current = document.getElementById('langCurrent');


        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('open');
        });

        document.addEventListener('click', function() {
            dropdown.classList.remove('open');
        });
    })();
</script>