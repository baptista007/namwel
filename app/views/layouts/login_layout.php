<?php
$controller_name = Router::$controller_name;
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

    Html::page_css('fontawesome.all.min.css');
    Html::page_css('bootstrap.min.css');
    Html::page_css('login-theme.css?ts=' . time());
    Html::page_js('jquery-3.3.1.min.js');
    ?>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">
                    <img src="<?= SITE_ADDR . SITE_LOGO ?>" alt="<?= SITE_NAME ?>" class="img-fluid" alt="Namwel Tours & Car Rentals">
                </div>
                <h1 class="login-title">Admin Portal</h1>
                <p class="login-subtitle">Sign in to manage your dashboard</p>
            </div>

            <div class="login-body">
                <div class="error-message" id="errorMessage">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span id="errorText">Invalid credentials. Please try again.</span>
                </div>

                <form name="loginForm" id="loginForm" action="<?php print_link('admin/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="text" class="form-control" name="username" id="username" placeholder="admin@namweltours.com" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="remember-forgot">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="forgot-link">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn btn-login">
                        <span class="btn-text">Sign In</span>
                        <span class="loading">
                            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                            Signing in...
                        </span>
                    </button>
                </form>
            </div>

            <div class="login-footer">
                <a href="index.html" class="back-link">
                    <i class="bi bi-arrow-left"></i>
                    Back to Website
                </a>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('errorMessage');
            const btn = document.querySelector('.btn-login');

            // Simple validation demo
            if (!username || !password) {
                errorMessage.classList.add('show');
                document.getElementById('errorText').textContent = 'Please enter both username and password.';
                return;
            }

            // Show loading state
            btn.classList.add('loading');
            errorMessage.classList.remove('show');

            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    errorMessage.classList.add('show');
                    document.getElementById('errorText').textContent = 'Login successful.';

                    window.location.href = data.redirectUrl;
                } else {
                    errorMessage.classList.add('show');
                    document.getElementById('errorText').textContent = data.message;
                    btn.classList.remove('loading');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>

</html>