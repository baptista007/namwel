<?php
// GLightbox assets — output here so they land in the rendered body (browsers handle this fine)
Html::page_css('glightbox.min.css');

$view_data  = $this->view_data;
$records    = $view_data->records ?? [];
$has_photos = false;
$has_videos = false;

// Pre-classify so we know which filter tabs to show
foreach ($records as $item) {
    if ($item['type'] == MediaType::image) $has_photos = true;
    else $has_videos = true;
}

$show_filters = $has_photos && $has_videos;

/**
 * Extract a YouTube video ID from any common YouTube URL variant.
 * Returns null if the URL is not a YouTube link.
 */
function gallery_youtube_id($url) {
    preg_match(
        '/(?:youtube\.com\/(?:embed\/|watch\?(?:.*&)?v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
        $url,
        $m
    );
    return $m[1] ?? null;
}

/**
 * Extract a Vimeo video ID from a Vimeo URL.
 */
function gallery_vimeo_id($url) {
    preg_match('/vimeo\.com\/(\d+)/', $url, $m);
    return $m[1] ?? null;
}
?>

<!-- GLightbox init style: ensure overlay appears above nav -->
<style>
.glightbox-open { overflow: hidden; }
.goverlay { z-index: 9990; }
.glightbox-container { z-index: 9999; }
</style>

<!-- Gallery Section -->
<section class="gallery-section py-5">
    <div class="container">

        <!-- Section Header -->
        <div class="section-header text-center mb-5">
            <h2><?= get_lang('gallery_title') ?></h2>
            <p><?= get_lang('gallery_desc') ?></p>
        </div>

        <?php if (empty($records)): ?>
        <!-- Empty State -->
        <div class="gallery-empty">
            <i class="fas fa-images"></i>
            <p><?= get_lang('gallery_empty') ?></p>
        </div>

        <?php else: ?>

        <!-- Filter Tabs (only shown when both photos and videos exist) -->
        <?php if ($show_filters): ?>
        <div class="gallery-filters" role="tablist" aria-label="Gallery filter">
            <button class="gallery-filter-btn active" data-filter="all"><?= get_lang('gallery_filter_all') ?></button>
            <?php if ($has_photos): ?>
            <button class="gallery-filter-btn" data-filter="photo">
                <i class="fas fa-camera"></i> <?= get_lang('gallery_filter_photos') ?>
            </button>
            <?php endif; ?>
            <?php if ($has_videos): ?>
            <button class="gallery-filter-btn" data-filter="video">
                <i class="fas fa-play-circle"></i> <?= get_lang('gallery_filter_videos') ?>
            </button>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- Grid -->
        <div class="gallery-grid" id="galleryGrid">
            <?php foreach ($records as $item): ?>
            <?php
                $is_image = $item['type'] == MediaType::image;
                $filter_class = $is_image ? 'gallery-item--photo' : 'gallery-item--video';
                $alt = htmlspecialchars($item['alt'] ?? $item['original_name'] ?? '', ENT_QUOTES);
            ?>

            <div class="gallery-item <?= $filter_class ?>" data-type="<?= $is_image ? 'photo' : 'video' ?>">

                <?php if ($is_image): ?>
                    <?php
                        $ext = strtolower(pathinfo($item['path'], PATHINFO_EXTENSION));
                        $src = SITE_ADDR . UPLOAD_FILE_DIR . rawurlencode($item['path']);
                    ?>
                    <?php if (isImage($ext)): ?>
                    <a href="<?= $src ?>"
                       class="gallery-img-link glightbox"
                       data-gallery="namwel-gallery"
                       data-glightbox="title: <?= $alt ?>"
                       title="<?= $alt ?>">
                        <img src="<?= $src ?>"
                             alt="<?= $alt ?>"
                             class="gallery-img"
                             loading="lazy">
                        <div class="gallery-overlay">
                            <span class="gallery-zoom"><i class="fas fa-expand-alt"></i></span>
                            <?php if ($alt): ?><span class="gallery-caption"><?= $alt ?></span><?php endif; ?>
                        </div>
                    </a>
                    <?php elseif (isVideo($ext)): ?>
                    <video class="gallery-video-file" controls preload="none">
                        <source src="<?= $src ?>" type="video/mp4">
                    </video>
                    <?php endif; ?>

                <?php else: ?>
                    <?php
                        $link  = trim($item['path']);
                        $yt_id = gallery_youtube_id($link);
                        $vm_id = gallery_vimeo_id($link);
                    ?>
                    <div class="gallery-embed-wrap">
                        <?php if ($yt_id): ?>
                        <iframe
                            src="https://www.youtube-nocookie.com/embed/<?= htmlspecialchars($yt_id) ?>?rel=0"
                            title="<?= $alt ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                        <?php elseif ($vm_id): ?>
                        <iframe
                            src="https://player.vimeo.com/video/<?= htmlspecialchars($vm_id) ?>?title=0&byline=0&portrait=0"
                            title="<?= $alt ?>"
                            frameborder="0"
                            allow="autoplay; fullscreen; picture-in-picture"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                        <?php else: ?>
                        <!-- Fallback: render whatever embed code was stored -->
                        <div class="gallery-embed-raw"><?= $link ?></div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>

            </div>
            <?php endforeach; ?>
        </div><!-- /gallery-grid -->

        <?php endif; ?>

    </div>
</section>

<!-- GLightbox JS -->
<?php Html::page_js('glightbox.min.js'); ?>
<script>
(function () {
    const lb = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        autoplayVideos: false,
    });

    <?php if ($show_filters): ?>
    // Filter logic
    const filterBtns = document.querySelectorAll('.gallery-filter-btn');
    const items      = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.dataset.filter;
            items.forEach(item => {
                const match = filter === 'all' || item.dataset.type === filter;
                item.style.display = match ? '' : 'none';
            });
        });
    });
    <?php endif; ?>
})();
</script>
