<?php
$page_id = null;
$comp_model = new SharedController;
$db = $comp_model->GetModel();
$current_page = $this->set_current_page_link();

$clients = $db->get(SqlTables::tbl_client);
$plans = $db->get(SqlTables::tbl_plan);
$counters = $db->getOne(SqlTables::tbl_statistics);

$db->orderBy("created_date", "DESC");
$news = $db->get(SqlTables::tbl_news);

$db->orderBy("created_date", "ASC");
$faqs = $db->get(SqlTables::tbl_faq);
?>

<section class="position-relative jarallax pb-xl-3" data-jarallax="" data-speed="0.4" data-bs-theme="dark">
    <!-- Parallax img -->
    <!-- Overlay bg -->
    <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-70 zindex-1"></span>
    <!-- Overlay content -->
    <div class="container position-relative pb-xl-3 zindex-5">
        <!-- Featured article -->
        <div class="row mb-xxl-5 py-md-4 py-lg-5">
            <div class="col-lg-6 col-md-7 pb-3 pb-md-0 mb-4 mb-md-5">
                <h1 class="display-5 pb-md-3" data-aos="fade-up"><?= get_lang('welcome_to') ?> <?= get_lang('company_name') ?></h1>
                <div class="d-flex flex-wrap mb-md-5 mb-4 pb-md-2 text-white">
                    <div class="border-end border-light h-100 mb-2 pe-3 me-3" data-aos="fade-down">
                        <?= get_lang('our_specialty') ?>
                    </div>
                </div>
            </div>
            <!-- Articles slider -->
            <div class="col-lg-4 offset-lg-2 col-md-5">
                <div class="row row-cols-md-1 row-cols-sm-2 row-cols-1 g-md-4 g-3">
                    <!-- Article -->
                    <div class="col">
                        <?php
                        $services = [
                            [
                                'title' => 'services_translation_title',
                                'link' => get_link('index/services')
                            ],
                            [
                                'title' => 'services_interpret_title',
                                'link' => get_link('index/services')
                            ],
                            [
                                'title' => 'services_subtitle_title',
                                'link' => get_link('index/services')
                            ],
                            [
                                'title' => 'services_voice_over_title',
                                'link' => get_link('index/services')
                            ],
                            [
                                'title' => 'services_conf_equip_title',
                                'link' => get_link('index/services')
                            ],
                        ];

                        foreach ($services as $service) {
                            echo '<div class="services-intro">';
                            echo '<a class="" href="' . $service['link'] . '">';
                            echo '<i class="fas fa-chevron-right"></i> ';
                            echo get_lang($service['title']);
                            echo '</a>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="jarallax-container-0" class="jarallax-container" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);">
        <img class="jarallax-img" src="<?= SITE_ADDR . IMG_DIR . 'bg-cover.jpg' ?>" alt="">
    </div>
</section>

<section class="container mt-2 mt-md-4 mt-lg-5">
    <div class="row pt-xl-3">
        <div class="col-md-5 text-center text-md-start pb-5">
            <h1 class="mb-4"><?= get_lang('gateway') ?></h1>
            <p class="fs-lg pb-lg-3 mb-4">
                <?= get_lang('brief_intro') ?>
            </p>
            <a href="<?= get_link('index/about') ?>" class="btn btn-primary shadow-primary btn-lg">More About Us</a>
        </div>
        <div class="col-xl-6 col-md-7 offset-xl-1 pb-4 pb-sm-3 pb-lg-0 mb-4 mb-sm-5 mb-lg-0">
            <img src="<?= SITE_ADDR . IMG_DIR . 'language-solution.png' ?>" class="rounded-3 shadow-sm" alt="Image">
        </div>
    </div>
</section>

<section class="container py-5 my-2 my-md-4 my-lg-5">
    <h2 class="h1 mb-4" data-aos="fade-down"><?= get_lang('languages_covered') ?></h2>
    <p class="fs-lg text-muted pb-2 mb-5"></p>
    <div class="swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
        <div class="swiper-wrapper swiper-slider" aria-live="polite">

            <!-- Item -->
            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 6" style="width: 140px;">
                <div class="position-relative text-center border-end mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="Facebook">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/us.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_en') ?></h6>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 6" style="width: 140px;">
                <div class="position-relative text-center border-end mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="Instagram">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/fr.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_fr') ?></h6>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide" role="group" aria-label="3 / 6" style="width: 140px;">
                <div class="position-relative text-center border-end mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="Twitter">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/es.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_es') ?></h6>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide" role="group" aria-label="4 / 6" style="width: 140px;">
                <div class="position-relative text-center border-end mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="LinkedIn">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/pt.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_pt') ?></h6>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide" role="group" aria-label="5 / 6" style="width: 140px;">
                <div class="position-relative text-center border-end mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="Twitter">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/de.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_de') ?></h6>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide" role="group" aria-label="6 / 6" style="width: 140px;">
                <div class="position-relative text-center border-end mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="Dribbble">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/tz.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_sw') ?></h6>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide" role="group" aria-label="6 / 6" style="width: 140px;">
                <div class="position-relative text-center border-end mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="Dribbble">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/cn.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_cn') ?></h6>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide" role="group" aria-label="6 / 6" style="width: 140px;">
                <div class="position-relative text-center border-end mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="Dribbble">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/africa.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_local') ?></h6>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide" role="group" aria-label="6 / 6" style="width: 140px;">
                <div class="position-relative text-center mx-n1">
                    <a href="#" class="btn btn-icon btn-light btn-lg stretched-link" aria-label="Dribbble">
                        <img src="<?= SITE_ADDR . IMG_DIR . 'flags/world.svg' ?>" alt="Image">
                    </a>
                    <div class="pt-4">
                        <h6 class="mb-1"><?= get_lang('languages_more') ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 mt-md-3 my-lg-5">
    <h2 class="h1 mb-4" data-aos="fade-up"><?= get_lang('some_of_our_engagements') ?></h2>
    <p class="fs-lg text-muted pb-2 mb-5"></p>

    <div class="">
        <div class="row justify-content-center">
            <?php
            echo '<div class="row mb-4">';
            $items = array_slice($news, 0, 3);
            foreach ($items as $item) {
                echo '<div class="col-lg-4 col-sm-6 mb-5" data-aos="zoom-in" data-aos-delay="100">';
                echo '<div class="card p-0 border-primary rounded-0 hover-shadow">';
                echo '<div class="course-thumb set-bg" style="width: 100%; height:170px; background-image: url(' . SITE_ADDR . UPLOAD_FILE_DIR . $item['cover_image'] . '); background-repeat: no-repeat; background-size: cover; background-position: top center;"></div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $item['title'] . '</h5>';
                echo '<a href="' . get_link('index/news_item/' . $item['id']) . '" class="btn btn-primary">';
                echo get_lang('more_details');
                echo '</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div>';

            if (count($news) > 3) {
                echo '<div class="text-center">';
                echo '<a href="' . get_link('index/news') . '" class="btn btn-primary">';
                echo get_lang('all_news');
                echo '</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>


<!-- ======= Clients Section ======= -->
<section class="container py-5 mt-md-3 my-lg-5">
    <h2 class="h1 mb-4" data-aos="fade-up"><?= get_lang('clientele') ?></h2>
    <p class="fs-lg text-muted pb-2 mb-5"><?= get_lang('engagements_desc') ?></p>
    <div class="pb-5 mb-lg-2 mb-xl-4">
        <div class="swiper mx-n2 swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-87ed46926215f456" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                <?php
                foreach ($clients as $client) {
                    echo '<div class="swiper-slide py-3" role="group" aria-label="1 / 6" style="width: 212px; margin-right: 8px;">';
                    echo '<a href="#" class="card card-body card-hover px-2 mx-2">';
                    echo '<img src="' . get_link(UPLOAD_FILE_DIR . $client['path']) . '" class="d-block mx-auto my-2" width="154" alt="Brand" />';
                    echo '</a>';
                    echo '</div>';
                }
                ?>
            </div>

            <!-- Pagination (bullets) -->
            <div class="swiper-pagination position-relative pt-2 mt-4 swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>


<script type="text/javascript">
    // Replace with your access token
    const accessToken = 'EAA1Gh7RLMdkBOxG7tjRgwrlGS0wruDFlMuu5NqpuincOPmAjbDkjN4XKlTTzZBiMBv9SZBDtZAc5M0vCIXzUoF6oZCtw4fooZBg3II2gWAy23IgREQY2NqRz5KIDBnMyGQmtvziKSG6FPCKxn0q8b4vIaf9lCNAVBuk33ZBZBAQ7y4rrZCg6PhbZBpE4i2P2za3HqsosFra7Gxn5nhcJj8d2FZA412ZAGyw80zGmcEug7vjiC1m06eUMV6qsEWZBEdt8ukZBmZBXZCt9AZDZD';

    // Replace with the Page ID of the page you want to fetch posts from
    const pageId = 'Psfzk2lrirf9g';

    // Construct the URL for the Graph API request
    const url = `https://graph.facebook.com/${pageId}/posts?fields=message,created_time&access_token=${accessToken}`;
    
    
    $(function () {
        // Fetch data from Facebook Graph API
        fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Check if request was successful
                    if (data && data.data) {
                        // Extract posts
                        const posts = data.data;

                        // Process and display posts
                        posts.forEach(post => {
                            console.log(post.message); // or any other relevant field like 'created_time'
                        });
                    } else {
                        console.log(data);
                    }
                })
                .catch(error => {
                    console.error('Error fetching posts:', error);
                });
    });
</script>