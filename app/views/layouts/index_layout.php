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
    <?php if ($this->show_page_tile): ?>
        <section class="page-hero">
            <div class="container">
                <div class="page-hero-content">
                    <h1><?= $page_title ?></h1>
                    <div class="breadcrumb">
                        <a href="<?= $page_name ?>"><?= ucfirst($page_name) ?></a>
                        <span>/</span>
                        <span><?= ucfirst($page_action) ?></span>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <main class="main">
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
</script>
<!-- Google Translate API -->
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" defer></script>
<script>
    // Init Google Translate (hidden, we drive it ourselves)
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,fr,pt,zh-CN,es',
            autoDisplay: false
        }, 'google_translate_element');
    }

    // Trigger translation by setting the cookie Google Translate uses
    function setGoogleTranslateLang(lang) {
        if (lang === 'en') {
            // Reset to original — delete the cookie and reload
            document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + location.hostname;
            location.reload();
            return;
        }
        var expires = new Date(Date.now() + 365 * 24 * 60 * 60 * 1000).toUTCString();
        document.cookie = 'googtrans=/en/' + lang + '; expires=' + expires + '; path=/';
        document.cookie = 'googtrans=/en/' + lang + '; expires=' + expires + '; path=/; domain=' + location.hostname;
        location.reload();
    }

    // Language switcher UI
    (function() {
        var toggle = document.getElementById('langToggle');
        var dropdown = document.getElementById('langDropdown');
        var current = document.getElementById('langCurrent');

        // Detect active language from cookie
        var match = document.cookie.match(/googtrans=\/en\/([^;]+)/);
        if (match) {
            var code = match[1];
            var map = {
                'fr': 'FR',
                'pt': 'PT',
                'zh-CN': '中文',
                'es': 'ES',
                'en': 'EN'
            };
            if (map[code]) current.textContent = map[code];
        }

        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('open');
        });

        document.querySelectorAll('.lang-option').forEach(function(btn) {
            btn.addEventListener('click', function() {
                current.textContent = this.dataset.label;
                dropdown.classList.remove('open');
                setGoogleTranslateLang(this.dataset.lang);
            });
        });

        document.addEventListener('click', function() {
            dropdown.classList.remove('open');
        });
    })();
</script>