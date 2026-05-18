<?php
$page_title = $this->get_page_title();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= SITE_NAME . ' - ' . $page_title ?></title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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

    <!-- Minimal header — no JS-heavy nav needed for info/error pages -->
    <header class="header scrolled" id="header" style="position:relative;">
        <div class="container">
            <div class="header-inner">
                <a href="<?= get_link('index/index') ?>" class="logo">
                    <img src="<?= SITE_ADDR . SITE_LOGO ?>" alt="<?= SITE_NAME ?>" class="img-fluid">
                </a>
                <div class="header-right">
                    <a class="btn btn-primary notranslate" href="<?= get_link('index/index') ?>">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="main" style="min-height:70vh; padding: 60px 0;">
        <?php $this->render_body(); ?>
    </main>

    <?php $this->render_view('appfooter.php'); ?>

    <?php Html::page_js('bootstrap.bundle.min.js'); ?>
</body>

</html>
