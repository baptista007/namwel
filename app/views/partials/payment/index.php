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
                    <h2 class="h4">Enter Payment Code</h2>
                    <p class="text-muted">Your payment security code was provided by our team along with your booking confirmation.</p>
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
                                    Payment Security Code <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       id="payment_code"
                                       name="payment_code"
                                       class="form-control form-control-lg <?= !empty($errors) ? 'is-invalid' : '' ?>"
                                       placeholder="e.g. NWTS@2610001"
                                       value="<?= htmlspecialchars($_POST['payment_code'] ?? '') ?>"
                                       autocomplete="off"
                                       required>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-lock me-2"></i> Proceed to Payment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted small mt-3">
                    <i class="fas fa-lock me-1"></i>
                    You will be redirected to our secure payment gateway after validation.
                </p>

                <div class="text-center mt-2">
                    <small class="text-muted">
                        Don't have a code?
                        <a href="<?= get_link('index/contact') ?>">Contact us</a>
                    </small>
                </div>

            </div>
        </div>
    </div>
</section>
