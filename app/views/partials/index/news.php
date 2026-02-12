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
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <?php
            foreach ($records as $item) {
                echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">';
                echo '<div class="card mb-4">';
                Html::simple_uploaded_image($item['cover_image']);
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $item['title'] . '</h5>';
                echo '<p class="card-text">' . html_entity_decode(SharedController::getDescPreview((!empty($item['excerpt']) ? $item['excerpt'] : $item['description']))) . '</p>';
                echo '<a href="' . get_link('index/news_item/' . $item['id']) . '" class="btn btn-orange">';
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