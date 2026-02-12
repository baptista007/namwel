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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.11.0/css/flag-icons.min.css"/>
        <?php
        Html::page_meta('theme-color', META_THEME_COLOR);
        Html::page_meta('author', META_AUTHOR);
        Html::page_meta('keyword', META_KEYWORDS);
        Html::page_meta('description', META_DESCRIPTION);
        Html::page_meta('viewport', META_VIEWPORT);
        
        //Vendor CSS Files
        Html::page_asset('vendor/bootstrap/css/bootstrap.min.css');
        Html::page_asset('vendor/bootstrap-icons/bootstrap-icons.css');
        Html::page_asset('vendor/aos/aos.css');
        Html::page_asset('vendor/swiper/swiper-bundle.min.css');
        Html::page_asset('vendor/glightbox/css/glightbox.min.css');

        //Main CSS
        Html::page_css('main.css');
        Html::page_css('custom.css');

        Html::page_js('jquery-3.3.1.min.js');
        ?>
    </head>
    <body class="index-page">
        <?= $this->render_view("appheader.php") ?>
        <main class="main">
            <?php $this->render_body(); ?>
        </main>
        <?= $this->render_view("appfooter.php") ?>
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>
        <?php
        Html::page_asset('vendor/bootstrap/js/bootstrap.bundle.min.js');
        Html::page_asset('vendor/php-email-form/validate.js');
        Html::page_asset('vendor/aos/aos.js');
        Html::page_asset('vendor/purecounter/purecounter_vanilla.js');
        Html::page_asset('vendor/swiper/swiper-bundle.min.js');
        Html::page_asset('vendor/isotope-layout/isotope.pkgd.min.js');
        Html::page_asset('vendor/imagesloaded/imagesloaded.pkgd.min.js');
        Html::page_asset('vendor/glightbox/js/glightbox.min.js');
        Html::page_js('aos.js');
        Html::page_js('purecounter_vanilla.js');
        Html::page_js('glightbox.min.js');
        Html::page_js('swiper-bundle.min.js');
        Html::page_js('main.js');
        ?>
    </body>
</html>