<?php

?>
<section class="page-title section dark-background">
    <div class="container position-relative" data-aos="fade-up">
        <h1>Request a quote</h1>
        <p>Fill in the form below to request a quote</p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="<?= get_link('index/index') ?>">Home</a></li>
                <li class="current">Request a quote</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="booking-form-wrapper">
            <div class="booking-form">
                <h3 class="form-title">Request a Quote</h3>
                <p class="text-muted mb-3">We respond within 24 hours on business days.</p>

                <form action="<?= get_link('info/contact') ?>#quote" method="get">
                    <div class="form-group mb-3">
                        <label for="destination">Destination</label>
                        <select name="destination" id="destination" class="form-select" required>
                            <option value="">Choose a destination</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Botswana">Botswana</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Angola">Angola</option>
                            <option value="Multi-country">Multi‑country</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="start">Start Date</label>
                                <input type="date" name="start" id="start" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="days">Trip Length</label>
                                <select name="days" id="days" class="form-select" required>
                                    <option value="">Days</option>
                                    <option value="3-5">3–5</option>
                                    <option value="6-8">6–8</option>
                                    <option value="9-12">9–12</option>
                                    <option value="13-16">13–16</option>
                                    <option value="17+">17+</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="travelers">Travellers</label>
                                <select name="travelers" id="travelers" class="form-select" required>
                                    <option value="">People</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3-4">3–4</option>
                                    <option value="5-8">5–8</option>
                                    <option value="9+">9+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="style">Travel Style</label>
                                <select name="style" id="style" class="form-select" required>
                                    <option value="">Choose</option>
                                    <option value="Guided Safari">Guided safari</option>
                                    <option value="Self-drive">Self‑drive</option>
                                    <option value="Camping">Camping</option>
                                    <option value="Honeymoon">Honeymoon</option>
                                    <option value="Family">Family</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Continue</button>
                    <small class="d-block mt-2 text-muted">Or call/WhatsApp via the Contact page.</small>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /Travel Hero Section -->