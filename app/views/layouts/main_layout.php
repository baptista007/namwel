<?php
$controller_name = Router::$controller_name;
$page_name = Router::$page_name;
$page_action = Router::$page_action;
$page_id = Router::$page_id;
$body_class = "$page_name-" . str_ireplace('list', 'index', $page_action);
$page_title = $this->get_page_title();

$comp_model = new SharedController();
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

        Html::page_css('bootstrap.min.css');
        Html::page_css('sb-admin.css');

        Html::page_js('jquery-3.3.1.min.js');
        Html :: page_js('tinymce/tinymce.min.js');
        Html::page_css('custom-style.css');
        Html::page_css('admin-custom-style.css?ts=' . time());
        ?>
    </head>
    <?php
    $page_id = "index";
    if (user_login_status() == true) {
        $page_id = "main";
    }
    ?>

    <body id="page-top" <?= ($controller_name == 'ProductController' ? "ng-app='ItecmaApp'" : "") ?>>
        <div class="se-pre-con"></div>
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= SITE_ADDR ?>admin">
                    <div class="sm-screen-logo">
                        <img src="<?= SITE_ADDR . SITE_LOGO?>" alt="Logo" />
                    </div>
                    <div class="lg-screen-logo">
                        <img src="<?= SITE_ADDR . SITE_LOGO?>" alt="Logo" />
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?= isActiveController(array("admin"), $page_name) ?>">
                    <a class="nav-link" href="<?= SITE_ADDR ?>admin">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <?php
                $menu = [
                    [
                        'path' => 'admin/contacts',
                        'label' => 'Contacts',
                        'icon' => 'users'
                    ],
                    [
                        'path' => 'client',
                        'label' => 'Clients',
                        'icon' => 'briefcase'
                    ],
                    [
                        'path' => 'testimonial',
                        'label' => 'Testimonials',
                        'icon' => 'comments'
                    ],
                    [
                        'path' => 'news',
                        'label' => 'News',
                        'icon' => 'newspaper'
                    ],
//                    [
//                        'path' => 'banner',
//                        'label' => 'Banners',
//                        'icon' => 'image'
//                    ],
                    [
                        'path' => 'statistics',
                        'label' => 'Statistics',
                        'icon' => 'sort-numeric-down-alt'
                    ],
                    [
                        'path' => 'gallery',
                        'label' => 'Gallery',
                        'icon' => 'photo-video'
                    ],
//                    [
//                        'path' => 'vacancy',
//                        'label' => 'Vacancies',
//                        'icon' => 'hard-hat'
//                    ],
                    [
                        'path' => 'user',
                        'label' => 'Users',
                        'icon' => 'users'
                    ]
                ];
                
                foreach ($menu as $item) {
                    echo '<li class="nav-item ' . isActiveController($item['path'], $page_name) . '">';
                    echo '<a class="nav-link" href="' . get_link($item['path']) . '">';
                    echo (!empty($item['icon']) ? '<i class="fas fa-'. $item['icon'] . '"></i>' : '');
                    echo '<span>' . $item['label'] . '</span>';
                    echo '</a>';
                    echo '</li>';
                }
                ?>
                
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="<?= SITE_ADDR ?>" target="_blank">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Site publico</span>
                    </a>
                </li>

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fas fa-bars"></i>
                    </button>

                    <h3 style="width: 60%;">
                        <?php echo $page_title; ?>
                    </h3>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"  method="get" action="">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small search-field" placeholder="Search for..."
                                   aria-label="Search" aria-describedby="basic-addon2" name="search" value="<?= (!empty($_GET['search']) ? $_GET['search'] : '') ?>">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                <button class="btn btn-secondary" type="reset" onclick="$('.search-field').val(''); $('.navbar-search').submit();"> 
                                    <i class="fas fa-times fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search" method="get" action=""> 
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small search-field"
                                               placeholder="Search for..." aria-label="Search"
                                               aria-describedby="basic-addon2" name="search" value="<?= (!empty($_GET['search']) ? $_GET['search'] : '') ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                            <button class="btn btn-secondary" type="reset" onclick="$('.search-field').val(''); $('.navbar-search').submit();"> 
                                                <i class="fas fa-times fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo ucwords(USER_NAME); ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php print_link('account') ?>"><i class="fas fa-user-circle"></i> My Account</a>
                                <a class="dropdown-item" href="<?php print_link('admin/logout?csrf_token=' . Csrf::$token) ?>"><i class="fas fa-sign-out"></i> <?php print_lang('logout'); ?></a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Main Content -->
                <div id="content">
                    <!-- Page Main Content Start -->
                    <div id="app-body">
                        <div class="container-fluid">
                            <div class="flash-msg-container"><?php show_flash_msg(); ?></div>
                        </div>
                        <div class="m-2">
                            <div  class="card animated fadeIn">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12 comp-grid">
                                            <?php $this->render_body(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <div class="copyright">All rights reserved. &copy; <?= date('Y') . ' ' . SITE_NAME ?></div>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
        </div>

        <div id="ajax-modal" class="modal fade-scale" tabindex="-1" style="display: none;"></div>
        <script type="text/javascript">
            var siteAddr = '<?= SITE_ADDR ?>';
        </script>
        <?php
        Html::page_js('popper.js');
        Html::page_js('bootstrap.min.js');
        Html::page_js('jquery.form.min.js');
        Html::page_js('lightbox.min.js');
        Html::page_js('plugins.js');
        Html::page_js('plugins-init.js?ts=' . time());
        Html::page_js('page-scripts.js');

        if ($controller_name == 'ProductController') {
            Html :: page_js('angular-app.js?ts=' . time());
        }
        ?>
    </body>
</html>