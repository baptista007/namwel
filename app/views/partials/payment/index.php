<?php
$csrf_token = Csrf::$token;
$errors = $this->page_error ?? [];
?>
<!-- Payment Code Form -->
<section class="section m-4" id="payment-form">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">

                <div class="text-center mb-4">
                    <i class="fas fa-shield-alt fa-3x mb-3" style="color: var(--primary-color, #E65100);"></i>
                    <h2 class="h4"><?= get_lang('payment_enter_code_title') ?></h2>
                    <p class="text-muted"><?= get_lang('payment_enter_code_desc') ?></p>
                </div>

                <?php if (!empty($errors)): ?>
                <div class="alert alert-danger d-flex align-items-center gap-2" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <div><?= htmlspecialchars($errors[0]) ?></div>
                </div>
                <?php endif; ?>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <form action="<?= get_link('payment/index?csrf_token=' . $csrf_token) ?>#payment-form"
                              method="post" novalidate>
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="payment_code">
                                    <?= get_lang('payment_security_code') ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       id="payment_code"
                                       name="payment_code"
                                       class="form-control form-control-lg <?= !empty($errors) ? 'is-invalid' : '' ?>"
                                       placeholder="<?= get_lang('payment_security_code_example') ?>"
                                       value="<?= htmlspecialchars($_POST['payment_code'] ?? '') ?>"
                                       autocomplete="off"
                                       required>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-lock me-2"></i> <?= get_lang('payment_proceed') ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted small mt-3">
                    <i class="fas fa-lock me-1"></i>
                    <?= get_lang('payment_redirect_notice') ?>
                </p>

                <div class="text-center mt-2">
                    <small class="text-muted">
                        <?= get_lang('payment_no_code') ?>
                        <a href="<?= get_link('index/contact') ?>"><?= get_lang('payment_contact_us') ?></a>
                    </small>
                </div>

            </div>
        </div>
    </div>
</section>
