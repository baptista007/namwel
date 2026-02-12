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
<section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <div class="row gy-4 mb-4">
            <div class="col-lg-12">
                <div class="portfolio-info">
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
            echo '<div class="row">';

            foreach ($images as $file) {
                echo '<div class="col-3">';
                echo '<a href="' . get_link(UPLOAD_FILE_DIR . $file['path']) . '" class="glightbox">';
                echo '<img src="' . SITE_ADDR . UPLOAD_FILE_DIR . $file['path'] . '" style="max-height: 40vh;">';
                echo '</a>';
                echo '</div>';
            }
            
            echo '</div>';
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
            <section id="pricing" class="mt-5">
                <div class="container aos-init aos-animate" data-aos="fade-up">

                    <div class="section-title">
                        <h2><span><?= get_lang('other_engagements') ?></span></h2>
                    </div>

                    <div class="row">
                        <?php
                        foreach ($data['other_records'] as $item) {
                            echo '<div class="col-lg-4 col-sm-6 mb-5" data-aos="zoom-in" data-aos-delay="100">';
                            echo '<div class="card p-0 border-primary rounded-0 hover-shadow">';
                            echo '<div class="course-thumb set-bg" style="width: 100%; height:170px; background-image: url(' . SITE_ADDR . UPLOAD_FILE_DIR . $item['cover_image'] . '); background-repeat: no-repeat; background-size: cover; background-position: top center;"></div>';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $item['title'] . '</h5>';
                            echo '<p class="card-text">' . html_entity_decode(SharedController::getDescPreview((!empty($item['excerpt']) ? $item['excerpt'] : $item['description']))) . '</p>';
                            echo '<a href="' . get_link('index/news_item/' . $item['id']) . '" class="btn btn-primary">';
                            echo get_lang('more_details');
                            echo '</a>';
                            echo '</div>';
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