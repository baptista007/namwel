<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;

$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
?>
<section class="py-5 mt-md-3 my-lg-5">
    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
        <div class="container">

            <div class="row row-cols-1 row-cols-md-2">
                <?php
                $services = [
                    [
                        'title' => 'services_interpret_title',
                        'text' => 'services_interpret_text',
                        'imgs' => [
                            'interpreting-2.jpg'
                        ],
                    ],
                    [
                        'title' => 'services_translation_title',
                        'text' => 'services_document_trans_text',
                        'imgs' => [
                            'mac-pro.png'
                        ],
                    ],
                    [
                        'title' => 'services_subtitle_title',
                        'text' => 'services_dubbing_text',
                        'main_img' => 'subtitling.png',
                        'imgs' => [
                            'mac-pro.png'
                        ],
                    ],
                    [
                        'title' => 'services_voice_over_title',
                        'text' => 'services_voice_over_text',
                        'imgs' => [
                            'neuman-mic.png',
                            'apollo-twin-x.png'
                        ],
                        'text_2' => 'voice_over_dubbing_instruments_text'
                    ],
                    [
                        'title' => 'services_dubbing_title',
                        'text' => 'services_dubbing_text',
                        'imgs' => [
                            'neuman-mic.png',
                            'apollo-twin-x.png'
                        ],
                        'text_2' => 'voice_over_dubbing_instruments_text'
                    ],
                    [
                        'title' => 'services_conf_equip_title',
                        'text' => 'services_conf_equip_text',
                        'imgs' => [
                            'equipment-1.png',
                            'equipment-2.jpg'
                        ],
                    ],
                ];

                foreach ($services as $service) {
                    echo '<div class="col py-4 my-2 my-sm-3">';
                    echo '<a class="card card-hover h-100 border-0 shadow-sm text-decoration-none pt-5 px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3 me-xl-2" href="#">';
                    echo '<div class="card-body pt-3">';
//                    echo '<div class="d-inline-block rounded-3 position-absolute top-0 translate-middle-y p-3">';
//                    echo '<img src="' . SITE_ADDR . IMG_DIR . 'services/' . $service['main_img'] . '" class="d-block m-1" style="width: 60px;" />';
//                    echo '</div>';

                    if (count($service['imgs']) == 1) {
                        echo '<img src="' . SITE_ADDR . IMG_DIR . 'services/' . $service['imgs'][0] . '" class="card-img-top" alt="Card image">';
                    } else {
                        echo '<div class="swiper mx-n2 swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">';
                        echo '<div class="swiper-wrapper" id="swiper-wrapper-' . $service['title'] . '" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">';

                        $count = 0;

                        foreach ($service['imgs'] as $extra_img) {
                            echo '<div class="swiper-slide">';
                            echo '<img src="' . SITE_ADDR . IMG_DIR . 'services/' . $extra_img . '" class="d-block m-1" />';
                            echo '</div>';
                        }

                        echo '</div>';
                        echo '</div>';
                    }

                    echo '<h2 class="h4 d-inline-flex align-items-center">';
                    echo get_lang($service['title']);
                    echo '</h2>';
                    echo '<p class="fs-sm text-body mb-0">';
                    echo get_lang($service['text']);
                    echo '</p>';

                    if (!empty($service['text_2'])) {
                        echo '<p class="fs-sm text-body mb-0">';
                        echo get_lang($service['text_2']);
                        echo '</p>';
                    }

                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section><!-- End Icon Boxes Section -->
</section>