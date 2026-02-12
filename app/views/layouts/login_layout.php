<?php
// Set url Variable From Router Class
$page_name = Router::$page_name;
$page_action = Router::$page_action;
$page_id = Router::$page_id;
$body_class = "$page_name-" . str_ireplace('list', 'index', $page_action);
$page_title = $this->get_page_title();
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $page_title; ?></title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="shortcut icon" href="<?php print_link(SITE_FAVICON); ?>" />
        <?php
        Html::page_meta('theme-color', META_THEME_COLOR);
        Html::page_meta('author', META_AUTHOR);
        Html::page_meta('keyword', META_KEYWORDS);
        Html::page_meta('description', META_DESCRIPTION);
        Html::page_meta('viewport', META_VIEWPORT);
        Html::page_css('font-awesome.min.css');
        Html::page_css('animate.css');
        Html::page_css('blueimp-gallery.css');
        Html::page_css('flatpickr.min.css');
        Html::page_css('lightbox.min.css');
        Html::page_css('summernote-bs4.min.css');

        Html::page_css('sb-admin.css');
        Html::page_css('custom-style.css');

        Html::page_js('jquery-3.3.1.min.js');
        Html :: page_js('summernote-bs4.min.js');
        Html :: page_js('tinymce/tinymce.min.js');
        ?>
    </head>
    <?php
    $page_id = "index";
    if (user_login_status() == true) {
        $page_id = "main";
    }
    ?>

    <body id="<?php echo $page_id ?>" class="admin-body with-login <?php echo $body_class ?>">
        <div id="page-wrapper">
            <div id="topbar" class="navbar navbar-expand-md fixed-top navbar-light">
                <div class="container-fluid" style="align-items: center; justify-content: center;">
                    <div>
                        <a class="navbar-brand" href="<?php print_link(HOME_PAGE) ?>">
                            <img src="<?= SITE_ADDR . SITE_LOGO ?>" alt="Logo" style="max-height: 100px;" />
                        </a>
                    </div>
                </div>
            </div>
            <div id="main-content">
                <!-- Page Main Content Start -->
                <div id="page-content">
                    <div class="flash-msg-container"><?php show_flash_msg(); ?></div>
                    <?php $this->render_body(); ?>
                </div>
                <!-- Page Main Content [End] -->
            </div>
        </div>
        <!-- Page Footer Start -->
        <footer class="admin-footer footer border-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="copyright"><?php print_lang('all_rights_reserved'); ?> | &copy; <?php echo SITE_NAME ?> - <?php echo date('Y') ?></div>
                    </div>
                    <div class="col">
                        <div class="footer-links text-right">
                            <strong>
                                <a href="<?php print_link(); ?>">
                                    <?= get_lang('public_website') ?>
                                </a>
                            </strong>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
        <!-- Page Footer Ends -->
        <div id="ajax-modal" class="modal" role="dialog"></div>
        <script>
            var siteAddr = '<?php echo SITE_ADDR; ?>';
            var defaultPageLimit = <?php echo MAX_RECORD_COUNT; ?>;
            var csrfToken = '<?php echo Csrf::$token; ?>';
        </script>
        <?php
        Html::page_js('popper.js');
        Html::page_js('bootstrap.min.js');
        Html::page_js('jquery.form.min.js');
        Html::page_js('lightbox.min.js');
        Html::page_js('plugins.js'); //boostrapswitch, passwordStrength, twbs-pagination, blueimp-gallery,
        Html::page_js('plugins-init.js');
        Html::page_js('page-scripts.js');
        ?>
    </body>
</html>