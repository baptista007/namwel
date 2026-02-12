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
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php
            foreach ($records as $item) {
                echo '<div class="col-lg-4 col-md-6 portfolio-item filter-app">';

                if ($item['type'] == MediaType::image) {
                    $path_parts = pathinfo($item['path']);

                    if (isImage($path_parts['extension'])) {
                        echo '<a href="' . SITE_ADDR . UPLOAD_FILE_DIR . $item['path'] . '" data-gallery="portfolioGallery" class="glightbox preview-link" title="' . $item['original_name'] . '">';
                        Html::simple_uploaded_image($item['path']);

                        if (!empty($item['alt'])) {
                            echo '<div class="portfolio-info">';
                            echo '<h4>' . $item['alt'] . '</h4>';
                            echo '</div>';
                        }

                        echo '</a>';
                    }

                    if (isVideo($path_parts['extension'])) {
                        echo '<video width="320" height="240" controls>
                            <source src="' . SITE_ADDR . UPLOAD_FILE_DIR . $item['path'] . '" type="video/mp4">
                          Your browser does not support the video tag.
                          </video>';
                    }
                } else {
                    echo $item['path'];
                }

                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>
