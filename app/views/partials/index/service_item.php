<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;

$docs = [];
$images = [];

foreach ($data['files'] as $file) {
    $path_parts = pathinfo($file['path']);

    if (isImage($path_parts['extension'])) {
        $images[] = $file;
    } else {
        $docs[] = $file;
    }
}
?>
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>
                <?= get_lang('news_details') . ' : ' . $data['name'] ?>
            </h2>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <div class="row gy-4 mb-4">
            <div class="col-lg-12">
                <div class="portfolio-info">
                    <h3><?= $data['name'] ?></h3>
                    <div class="portfolio-description">
                        <p>
                            <?= html_entity_decode($data['description']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (!empty($images)) {
            ?>
            <div class="row gy-4 mb-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3><?= get_lang('photos') ?></h3>
                        <div class="portfolio-description">
                            <div class="swiper-slider swiper">
                                <div class="swiper-wrapper align-items-center">
                                    <?php
                                    foreach ($images as $file) {
                                        echo '<div class="swiper-slide">';
                                        echo '<a href="' . get_link(UPLOAD_FILE_DIR . $file['path']) . '" class="glightbox">';
                                        echo '<img src="' . SITE_ADDR . UPLOAD_FILE_DIR . $file['path'] . '" style="max-height: 40vh;">';
                                        echo '</a>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        if (!empty($docs)) {
            ?>
            <div class="row gy-4 mb-4">
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3><?= get_lang('documents') ?></h3>
                        <div class="portfolio-description">
                            <?php
                            echo '<ul class="list-group list-group-flush">';

                            foreach ($docs as $file) {
                                echo '<li class="list-group-item">';
                                echo '<a href=' . get_link(UPLOAD_FILE_DIR . $file['path']) . '" target="_blank">';
                                echo $file['original_name'];
                                echo '</a>';
                                echo '</li>';
                            }

                            echo '</ul>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        if (!empty($data['other_records'])) {
            ?>
            <section id="pricing" class="pricing">
                <div class="container aos-init aos-animate" data-aos="fade-up">

                    <div class="section-title">
                        <h3><span><?= get_lang('other_services') ?></span></h3>
                    </div>

                    <div class="row">
                        <?php
                        foreach ($data['other_records'] as $news_item) {
                            echo '<div class="col-lg-3 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">';
                            echo '<div class="box">';
                            echo '<h3>', $news_item['name'], '</h3>';
                            echo '<p class="card-text">' . SharedController::getDescPreview((!empty($news_item['excerpt']) ? $news_item['excerpt'] : $news_item['description'])) . '</p>';
                            echo '<div class="btn-wrap">';
                            echo '<a href="' . get_link('index/service_item/' . $news_item['id']) . '" class="btn btn-buy">';
                            echo get_lang('more_details');
                            echo '</div>';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>

                    </div>

                </div>
            </section>
            <?php
        }
        ?>
    </div>
</section>