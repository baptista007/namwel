<?php
// Set url Variable From Router Class
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
        <?php
        Html::page_meta('theme-color', META_THEME_COLOR);
        Html::page_meta('author', META_AUTHOR);
        Html::page_meta('keyword', META_KEYWORDS);
        Html::page_meta('description', META_DESCRIPTION);
        Html::page_meta('viewport', META_VIEWPORT);

        Html::page_css('animate.css');
        Html::page_css('aos.css');
        Html::page_css('bootstrap.min.css');
        Html::page_css('font-awesome.min.css?ts=' . time());
        Html::page_css('jarallax.min.css');
        Html::page_css('glightbox.min.css');
        Html::page_css('swiper-bundle.min.css');
        Html::page_css('theme-style.css?ts=' . time());
        Html::page_css('custom-style.css?ts=' . time());

        Html::page_js('jquery-3.3.1.min.js');
        ?>
    </head>
    <body class="page-wrapper" data-bs-spy="scroll" data-bs-target="#navmenu">
        <?= $this->render_view("appheader.php") ?>
        <main>
            <!-- ======= Breadcrumbs ======= -->
            <section id="breadcrumbs" class="breadcrumbs">
                <div class="container">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= get_link($page_name) ?>"><?= ucfirst($page_name) ?></a></li>
                        <li class="breadcrumb-item active"><?= ucfirst($page_action) ?></li>
                    </ol>
                </div>
                <!--  Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2><?= $page_title ?></h2>
                    <p></p>
                </div><!-- End Section Title -->
            </section><!-- End Breadcrumbs -->
            <?php $this->render_body(); ?>
        </main>
        <?= $this->render_view("appfooter.php") ?>
        <?php
        Html::page_js('popper.js');
        Html::page_js('purecounter_vanilla.js');
        Html::page_js('aos.js');
        Html::page_js('bootstrap.min.js');
        Html::page_js('swiper-bundle.min.js');
        Html::page_js('glightbox.min.js');
        Html::page_js('jarallax.min.js');
        Html::page_js('arsha.js');
        ?>
    </body>
</html>