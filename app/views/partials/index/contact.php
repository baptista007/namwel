<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$page_id = $this->route->page_id;
$csrf_token = Csrf::$token;

$contacts = $this->view_data;
?>
<!-- ======= Contact Section ======= -->
<section class="py-5 mt-md-3 my-lg-5">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="card border-light shadow-lg py-3 p-sm-4 p-md-5">
                    <div class="bg-dark position-absolute top-0 start-0 w-100 h-100 rounded-3 d-none d-dark-mode-block"></div>
                    <div class="card-body position-relative zindex-2">
                        <h2 class="h4 mb-4"><?= get_lang('reach_us') ?></h2>
                        <ul class="list-unstyled pb-2 pb-lg-0 mb-4 mb-lg-5">
                            <li class="d-flex pb-1 mb-2">
                                <i class="bx bx-map text-primary fs-xl me-2" style="margin-top: .125rem;"></i>
                                <?= get_lang('contact_address_building') ?>, <?= get_lang('contact_address_building_2') ?>
                                <br />
                                <?= get_lang('contact_address_street') ?>
                                <br />
                                <?= get_lang('contact_address_neighborhood') ?>
                            </li>
                            <li class="d-flex pb-1 mb-2">
                                <i class="fas fa-envelope text-primary fs-xl me-2" style="margin-top: .125rem;"></i>
                                <a href="mailto:info@chivembe.com">info@chivembe.com</a>
                            </li>
                            <li class="d-flex pb-1 mb-2">
                                <i class="fas fa-phone text-primary fs-xl me-2" style="margin-top: .125rem;"></i>
                                <a href="tel:+26461220007"> +264 61 220 007</a>
                            </li>
                            <li class="d-flex pb-1 mb-2">
                                <i class="fa fa-mobile text-primary fs-xl me-2" style="margin-top: .125rem;"></i>
                                <a href="tel:+264811254601">+264 81 125 4601</a>
                            </li>
                        </ul>
                        <div id="map"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-light shadow-lg py-3 p-sm-4 p-md-5">
                    <div class="bg-dark position-absolute top-0 start-0 w-100 h-100 rounded-3 d-none d-dark-mode-block"></div>
                    <div class="card-body position-relative zindex-2">
                        <h2 class="h4 mb-4"><?= get_lang('leave_message') ?></h2>
                        <form action="<?= get_link("index/contact?csrf_token=$csrf_token") ?>" method="post" role="form" class="php-email-form ajax" id="contact-form">
                            <div class="col-12">
                                <label for="fn" class="form-label fs-base"><?= get_lang('contact_name') ?></label>
                                <input type="text" class="form-control form-control-lg" id="fn" name="name" required="">
                                <div class="invalid-feedback">Please enter your full name!</div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label fs-base"><?= get_lang('contact_email') ?></label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" required="">
                                <div class="invalid-feedback">Please provide a valid email address!</div>
                            </div>
                            <div class="col-12">
                                <label for="time" class="form-label fs-base"><?= get_lang('contact_message') ?></label>
                                <textarea class="form-control form-control-lg" name="message" rows="5" placeholder="<?= get_lang('contact_message') ?>..." required></textarea>
                                <div class="invalid-feedback">Enter a time!</div>
                            </div>
                            <?php
                            $rand1 = rand(1, 20);
                            $rand2 = rand(1, 20);
                            ?>
                            <div class="form-group mb-3">
                                <label><?= get_lang('contact_verification') ?><span class="text-danger">*</span></label>
                                <div>
                                    <input type="hidden" value="<?= $rand1 ?>" name="rand_one" id="rand_one" />
                                    <input type="hidden" value="<?= $rand2 ?>" name="rand_two" id="rand_two" />
                                    <div class="input-group">
                                        <span class="input-group-text"><?= $rand1 ?> + <?= $rand2 ?> =</span>
                                        <input type="number" class="form-control" name="human_verification" id="human_verification" placeholder="<?= get_lang('contact_answer') ?>">
                                    </div>
                                    <span class="text-danger"</span>
                                </div>
                            </div> 
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><?= get_lang('contact_button') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->
<script type="text/javascript">
    let map;

    function initMap() {
        var center = {lat: -22.61893611111111, lng: 17.095391666666664};
        var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 15, center: center});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: center, map: map});
    }

    window.initMap = initMap;

    $(function () {
        $("#contact-form").submit(function (e) {
            e.preventDefault();
            $('#hello-feedback').html('');

            if (!$('#hello-feedback').hasClass('hidden')) {
                $('#hello-feedback').addClass('hidden');
            }

            $('#btn-submit').button('loading').prop('disabled', true);

            $.post(
                    $(this).attr('action'),
                    $(this).serialize(),
                    function (data) {
                        if (data.success) {
                            $('#hello-feedback').html('<div class="alert alert-success">' + data.message + '</div>').removeClass('hidden');
                            setTimeout(function () {
                                window.location.reload();
                            }, 5000);
                        } else {
                            $('#hello-feedback').html('<div class="alert alert-danger">' + data.message + '</div>').removeClass('hidden');
                            $('#btn-submit').button('reset').prop('disabled', false);
                        }
                    },
                    "json"
                    );
        });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8hGZ1vbGZ4K1WcbBZUcEHeQu91EP9YDY&callback=initMap&v=weekly" defer></script>