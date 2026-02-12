<?php /* Destinations index */ ?>
<section class="page-title section dark-background">
  <div class="container position-relative" data-aos="fade-up">
    <h1>Payment</h1>
    <p>Payment methods</p>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="<?= get_link('index/index') ?>">Home</a></li>
        <li class="current">Payment</li>
      </ol>
    </nav>
  </div>
</section>

<section class="section">
  <div class="container" data-aos="fade-up">
    <form action="<?= get_link('payment/index') ?>#quote" method="post" class="php-email-form">
        <div class="form-group">
            <label>Payment Code:</label>
            <input type="text" name="payment_code" required>
        </div>
        <input type="submit" value="Pay Now">
    </form>
  </div>
</section>
