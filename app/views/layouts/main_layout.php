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

    Html::page_css('fontawesome.all.min.css');
    Html::page_css('bootstrap.min.css');
    Html::page_css('admin-theme.css?ts=' . time());
    Html::page_js('jquery-3.3.1.min.js');
    ?>
</head>
<?php
$page_id = "index";
if (user_login_status() == true) {
    $page_id = "main";
}
?>

<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="<?= SITE_ADDR . SITE_LOGO ?>" alt="Namwel Tours" />
            <h4>Namwel Tours</h4>
            <span>Admin Dashboard</span>
        </div>

        <nav class="sidebar-menu">
            <div class="menu-section">Main</div>
            <ul class="nav flex-column">
                <?php
                $menu = [
                    [
                        'path' => 'admin',
                        'label' => 'Dashboard',
                        'icon' => 'dashboard'
                    ],
                    [
                        'path' => 'bookings',
                        'label' => 'Bookings',
                        'icon' => 'calendar'
                    ],
                    [
                        'path' => 'tours',
                        'label' => 'Tours',
                        'icon' => 'map'
                    ],
                    [
                        'path' => 'vehicles',
                        'label' => 'Vehicles',
                        'icon' => 'bus'
                    ],
                    [
                        'path' => 'paymentsecurity',
                        'label' => 'Payment Security Codes',
                        'icon' => 'barcode'
                    ],
                    [
                        'path' => 'quote',
                        'label' => 'Quote Requests',
                        'icon' => 'file-invoice'
                    ],
                ];

                foreach ($menu as $item) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link ' . isActiveController($item['path'], $page_name) . '" href="' . get_link($item['path']) . '">';
                    echo (!empty($item['icon']) ? '<i class="fas fa-' . $item['icon'] . '"></i>' : '');
                    echo $item['label'];
                    echo '</a>';
                    echo '</li>';
                }
                ?>
            </ul>

            <div class="menu-section">Management</div>
            <ul class="nav flex-column">
                <?php
                $menu = [
                    [
                        'path' => 'testimonial',
                        'label' => 'Reviews',
                        'icon' => 'comments'
                    ],
                    [
                        'path' => 'news',
                        'label' => 'News',
                        'icon' => 'newspaper'
                    ],
                    [
                        'path' => 'statistics',
                        'label' => 'Statistics',
                        'icon' => 'sort-numeric-down-alt'
                    ],
                    [
                        'path' => 'gallery',
                        'label' => 'Gallery',
                        'icon' => 'photo-video'
                    ]
                ];

                foreach ($menu as $item) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link ' . isActiveController($item['path'], $page_name) . '" href="' . get_link($item['path']) . '">';
                    echo (!empty($item['icon']) ? '<i class="fas fa-' . $item['icon'] . '"></i>' : '');
                    echo $item['label'];
                    echo '</a>';
                    echo '</li>';
                }
                ?>
            </ul>

            <div class="menu-section">Settings</div>
            <ul class="nav flex-column">
                <?php
                $menu = [
                    [
                        'path' => 'user',
                        'label' => 'Users',
                        'icon' => 'users'
                    ],
                    [
                        'path' => 'settings',
                        'label' => 'Settings',
                        'icon' => 'gear'
                    ],
                    [
                        'path' => 'reports',
                        'label' => 'Reports',
                        'icon' => 'file-text'
                    ]
                ];

                foreach ($menu as $item) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link ' . isActiveController($item['path'], $page_name) . '" href="' . get_link($item['path']) . '">';
                    echo (!empty($item['icon']) ? '<i class="fas fa-' . $item['icon'] . '"></i>' : '');
                    echo $item['label'];
                    echo '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </nav>

        <!-- <div class="sidebar-footer">
            <div class="admin-profile">
                <div class="admin-avatar">AD</div>
                <div class="admin-info">
                    <h6>Admin User</h6>
                    <small>Super Admin</small>
                </div>
            </div>
        </div> -->
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <div class="header-left">
                <button class="toggle-sidebar" onclick="toggleSidebar()">
                    <i class="fas fa-list"></i>
                </button>
                <div>
                    <h1 class="page-title"><?= $page_title ?></h1>
                    <nav class="breadcrumb-nav">
                        <a href="#"><?= ucfirst($page_name) ?></a>
                        <i class="fas fa-chevron-right"></i>
                        <span><?= ucfirst($page_action) ?></span>
                    </nav>
                </div>
            </div>

            <div class="search-box">
                <input type="text" placeholder="Search bookings, customers...">
                <i class="fas fa-search"></i>
            </div>

            <div class="header-right">
                <div class="header-actions">
                    <button class="header-btn">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </button>
                    <button class="header-btn">
                        <i class="fas fa-comments"></i>
                        <span class="badge">5</span>
                    </button>
                </div>
                <a href="#" class="user-dropdown">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=E65100&color=fff" alt="Admin">
                    <span>Admin</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <?php 
                $is_landing_page = $page_name == "admin" && $page_action == "index";

                if (!$is_landing_page) {
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                }

                $this->render_body(); 
                
                if (!$is_landing_page) {
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </main>

    <div id="ajax-modal" class="modal fade-scale" tabindex="-1" style="display: none;"></div>
    <script type="text/javascript">
        var siteAddr = '<?= SITE_ADDR ?>';
    </script>
    <?php
    Html::page_js('bootstrap.min.js');
    Html::page_js('jquery.form.min.js');
    Html::page_js('plugins-init.js?ts=' . time());
    ?>
</body>
</html>