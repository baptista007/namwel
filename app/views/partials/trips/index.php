<?php
$view_data = $this->view_data;
$trips = $view_data->trips ?? [];

$badge_colors = [
    'Guaranteed' => ['bg' => '#2E7D32', 'icon' => 'fa-check-circle'],
    'Last Spots' => ['bg' => '#C62828', 'icon' => 'fa-fire'],
    'Sold Out'   => ['bg' => '#424242', 'icon' => 'fa-ban'],
    'Limited'    => ['bg' => '#E65100', 'icon' => 'fa-hourglass-half'],
    'New'        => ['bg' => '#1565C0', 'icon' => 'fa-star'],
];
?>

<!-- ── Hero ─────────────────────────────────────────────────────────────── -->
<section class="gtrip-hero">
    <div class="gtrip-hero-bg"></div>
    <div class="gtrip-hero-overlay"></div>
    <div class="container position-relative text-white text-center gtrip-hero-content">
        <div class="gtrip-hero-badge mb-3">
            <i class="fas fa-calendar-check me-2"></i><?= get_lang('gtrip_hero_badge') . ' · ' . date('Y') ?>
        </div>
        <h1 class="gtrip-hero-title"><?= get_lang('gtrip_page_title') . ' ' . date('Y') ?></h1>
        <p class="gtrip-hero-subtitle"><?= get_lang('gtrip_page_subtitle') ?></p>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= get_link('index/index') ?>" class="text-white-50 notranslate"><?= get_lang('breadcrumb_home') ?></a></li>
                <li class="breadcrumb-item active text-white notranslate"><?= get_lang('gtrip_page_title') ?></li>
            </ol>
        </nav>
    </div>
    <div class="gtrip-hero-wave">
        <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,30 C360,60 1080,0 1440,30 L1440,60 L0,60 Z" fill="#F9F7F2"/></svg>
    </div>
</section>

<!-- ── What "Guaranteed" means ─────────────────────────────────────────── -->
<section class="py-5" style="background:#F9F7F2;">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="gtrip-pillar">
                    <div class="gtrip-pillar-icon"><i class="fas fa-shield-alt"></i></div>
                    <h5><?= get_lang('gtrip_pillar1_title') ?></h5>
                    <p class="text-muted small"><?= get_lang('gtrip_pillar1_desc') ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gtrip-pillar">
                    <div class="gtrip-pillar-icon"><i class="fas fa-users"></i></div>
                    <h5><?= get_lang('gtrip_pillar2_title') ?></h5>
                    <p class="text-muted small"><?= get_lang('gtrip_pillar2_desc') ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gtrip-pillar">
                    <div class="gtrip-pillar-icon"><i class="fas fa-calendar-check"></i></div>
                    <h5><?= get_lang('gtrip_pillar3_title') ?></h5>
                    <p class="text-muted small"><?= get_lang('gtrip_pillar3_desc') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── Trip Cards ────────────────────────────────────────────────────────── -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <span class="badge px-3 py-2 mb-2" style="background:#E65100;font-size:.85rem;letter-spacing:.5px;">
                <?= get_lang('gtrip_departures_badge') ?>
            </span>
            <h2 class="fw-bold" style="font-family:'Playfair Display',serif;"><?= get_lang('gtrip_departures_title') ?></h2>
            <p class="text-muted"><?= get_lang('gtrip_departures_desc') ?></p>
        </div>

        <?php if (empty($trips)): ?>
        <div class="text-center py-5">
            <i class="fas fa-compass fa-3x text-muted mb-3"></i>
            <h4 class="text-muted"><?= get_lang('gtrip_no_trips') ?></h4>
            <p class="text-muted"><?= get_lang('gtrip_no_trips_desc') ?></p>
            <a href="<?= get_link('index/quote') ?>" class="btn btn-primary mt-2">
                <i class="fas fa-paper-plane me-2"></i><?= get_lang('nav_request_quote') ?>
            </a>
        </div>
        <?php else: ?>

        <div class="row g-4">
            <?php foreach ($trips as $trip):
                $badge_key = $trip['badge'] ?? 'Guaranteed';
                $badge_cfg = $badge_colors[$badge_key] ?? $badge_colors['Guaranteed'];
                $spots_left = intval($trip['spots_left']);
                $spots_avail = intval($trip['spots_available']);
                $spots_pct = ($spots_avail > 0) ? min(100, round(($spots_left / $spots_avail) * 100)) : 0;
                $urgency = ($spots_left > 0 && $spots_left <= 4);
                $sold_out = ($badge_key === 'Sold Out');
                $dep_date = !empty($trip['departure_date']) ? strtotime($trip['departure_date']) : null;
                $dep_label = $dep_date ? date('d M Y', $dep_date) : null;
                $has_image = !empty($trip['cover_image']);
                $img_url = $has_image
                    ? SITE_ADDR . UPLOAD_FILE_DIR . htmlspecialchars($trip['cover_image'])
                    : SITE_ADDR . 'assets/images/travel/Grand-Spaces-of-Namibia-scaled.jpeg';
                $highlights = !empty($trip['highlights']) ? array_filter(explode("\n", $trip['highlights'])) : [];
            ?>
            <div class="col-lg-6">
                <div class="gtrip-card <?= $sold_out ? 'gtrip-card--sold-out' : '' ?> <?= $urgency ? 'gtrip-card--urgent' : '' ?>">

                    <!-- Image column -->
                    <div class="gtrip-card-img-wrap">
                        <img src="<?= $img_url ?>" alt="<?= html_entity_decode($trip['title']) ?>" class="gtrip-card-img">
                        <div class="gtrip-card-img-overlay"></div>

                        <!-- Badge -->
                        <div class="gtrip-card-badge" style="background:<?= $badge_cfg['bg'] ?>;">
                            <i class="fas <?= $badge_cfg['icon'] ?> me-1"></i><?= htmlspecialchars($badge_key) ?>
                        </div>

                        <!-- Departure pill -->
                        <?php if ($dep_label): ?>
                        <div class="gtrip-card-dep-pill">
                            <i class="fas fa-plane-departure me-1"></i><?= $dep_label ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Content column -->
                    <div class="gtrip-card-body">

                        <?php if (!empty($trip['destination'])): ?>
                        <p class="gtrip-card-destination">
                            <i class="fas fa-map-marker-alt me-1"></i><?= htmlspecialchars($trip['destination']) ?>
                        </p>
                        <?php endif; ?>

                        <h4 class="gtrip-card-title"><?= html_entity_decode($trip['title']) ?></h4>

                        <?php if (!empty($trip['subtitle'])): ?>
                        <p class="gtrip-card-subtitle"><?= htmlspecialchars($trip['subtitle']) ?></p>
                        <?php endif; ?>

                        <!-- Meta row -->
                        <div class="gtrip-card-meta">
                            <?php if (!empty($trip['duration'])): ?>
                            <span><i class="fas fa-clock me-1"></i><?= htmlspecialchars($trip['duration']) ?></span>
                            <?php endif; ?>
                            <?php if ($dep_label): ?>
                            <span><i class="fas fa-calendar me-1"></i><?= $dep_label ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Highlights -->
                        <?php if (!empty($highlights)): ?>
                        <ul class="gtrip-card-highlights">
                            <?php foreach (array_slice($highlights, 0, 3) as $h): ?>
                            <li><i class="fas fa-check text-success me-2"></i><?= htmlspecialchars(trim($h)) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>

                        <!-- Spots bar -->
                        <?php if ($spots_avail > 0): ?>
                        <div class="gtrip-card-spots">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-semibold <?= $urgency ? 'text-danger' : 'text-muted' ?>">
                                    <?php if ($sold_out): ?>
                                        <i class="fas fa-ban me-1"></i><?= get_lang('gtrip_sold_out') ?>
                                    <?php elseif ($urgency): ?>
                                        <i class="fas fa-fire me-1"></i>
                                        <?= sprintf(get_lang('gtrip_spots_left_n'), $spots_left) ?>
                                    <?php else: ?>
                                        <i class="fas fa-users me-1"></i>
                                        <?= sprintf(get_lang('gtrip_spots_of'), $spots_left, $spots_avail) ?>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="progress" style="height:6px;border-radius:4px;">
                                <div class="progress-bar <?= $urgency ? 'bg-danger' : 'bg-success' ?>"
                                     style="width:<?= $spots_pct ?>%;transition:width .6s ease;"></div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Price + CTA -->
                        <div class="gtrip-card-footer">
                            <div class="gtrip-card-price">
                                <?php if (!empty($trip['price_label'])): ?>
                                    <span class="gtrip-price-main"><?= htmlspecialchars($trip['price_label']) ?></span>
                                <?php elseif (!empty($trip['price']) && $trip['price'] > 0): ?>
                                    <span class="gtrip-price-from"><?= get_lang('pkgs_from') ?></span>
                                    <span class="gtrip-price-main">
                                        <?= htmlspecialchars($trip['price_currency'] ?? 'USD') ?>
                                        <?= number_format($trip['price'], 0) ?>
                                    </span>
                                    <span class="gtrip-price-pp"><?= get_lang('pkgs_per_person') ?></span>
                                <?php else: ?>
                                    <span class="gtrip-price-main"><?= get_lang('pkgs_on_request') ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="gtrip-card-ctas">
                                <?php if (!$sold_out): ?>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-paper-plane me-1"></i><?= get_lang('gtrip_book_now') ?>
                                </a>
                                <?php else: ?>
                                <a href="<?= get_link('index/quote') ?>" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-bell me-1"></i><?= get_lang('gtrip_notify_me') ?>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div><!-- /card-body -->
                </div><!-- /gtrip-card -->
            </div>
            <?php endforeach; ?>
        </div><!-- /row -->

        <?php endif; ?>
    </div>
</section>

<!-- ── CTA Banner ────────────────────────────────────────────────────────── -->
<section class="gtrip-cta-section py-5">
    <div class="container text-center text-white">
        <h2 class="fw-bold mb-2" style="font-family:'Playfair Display',serif;"><?= get_lang('gtrip_cta_title') ?></h2>
        <p class="mb-4 opacity-75"><?= get_lang('gtrip_cta_desc') ?></p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="<?= get_link('index/quote') ?>" class="btn btn-light btn-lg px-4">
                <i class="fas fa-paper-plane me-2"></i><?= get_lang('gtrip_cta_quote') ?>
            </a>
            <a href="<?= get_link('index/contact') ?>" class="btn btn-outline-light btn-lg px-4">
                <i class="fas fa-comments me-2"></i><?= get_lang('gtrip_cta_contact') ?>
            </a>
        </div>
    </div>
</section>

<style>
/* ── Guaranteed Trips Page Styles ───────────────────────────────────────── */

/* Hero */
.gtrip-hero {
    position: relative;
    min-height: 420px;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding-top: 160px;
    padding-bottom: 80px;
}
.gtrip-hero-bg {
    position: absolute;
    inset: 0;
    background: url('<?= SITE_ADDR ?>assets/images/travel/VictoriaFalls-Zimbabwe-Sunrise-BestSpot.jpeg') center/cover no-repeat;
}
.gtrip-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(27,94,32,.85) 0%, rgba(69,39,160,.7) 100%);
}
.gtrip-hero-content { position: relative; z-index: 2; }
.gtrip-hero-badge {
    display: inline-block;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.35);
    border-radius: 50px;
    padding: 6px 20px;
    font-size: .82rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    backdrop-filter: blur(4px);
}
.gtrip-hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 5vw, 3.4rem);
    font-weight: 700;
    margin-bottom: .5rem;
    text-shadow: 0 2px 12px rgba(0,0,0,.4);
}
.gtrip-hero-subtitle {
    font-size: 1.1rem;
    opacity: .85;
    max-width: 600px;
    margin: 0 auto;
}
.gtrip-hero-wave {
    position: absolute;
    bottom: -1px;
    left: 0;
    right: 0;
    z-index: 2;
    line-height: 0;
}
.gtrip-hero-wave svg { width: 100%; height: 60px; display: block; }

/* Pillars */
.gtrip-pillar {
    padding: 28px 20px;
    border-radius: 12px;
    background: #fff;
    box-shadow: 0 2px 16px rgba(0,0,0,.06);
    height: 100%;
    transition: transform .2s, box-shadow .2s;
}
.gtrip-pillar:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(0,0,0,.1); }
.gtrip-pillar-icon {
    width: 56px; height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, #E65100, #FFD700);
    color: #fff;
    font-size: 1.4rem;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px;
    box-shadow: 0 4px 14px rgba(230,81,0,.3);
}

/* Trip Cards */
.gtrip-card {
    display: flex;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,.09);
    background: #fff;
    height: 100%;
    transition: transform .25s, box-shadow .25s;
    border: 2px solid transparent;
}
.gtrip-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 40px rgba(0,0,0,.14);
}
.gtrip-card--urgent { border-color: #C62828; }
.gtrip-card--sold-out { opacity: .75; }

.gtrip-card-img-wrap {
    position: relative;
    width: 220px;
    min-width: 180px;
    flex-shrink: 0;
    overflow: hidden;
}
@media (max-width: 576px) { .gtrip-card { flex-direction: column; } .gtrip-card-img-wrap { width: 100%; min-height: 200px; } }

.gtrip-card-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .4s ease;
}
.gtrip-card:hover .gtrip-card-img { transform: scale(1.05); }

.gtrip-card-img-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to right, rgba(0,0,0,.25), transparent);
}
.gtrip-card-badge {
    position: absolute;
    top: 12px; left: 12px;
    color: #fff;
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .8px;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,.3);
}
.gtrip-card-dep-pill {
    position: absolute;
    bottom: 12px; left: 12px;
    background: rgba(0,0,0,.55);
    color: #fff;
    font-size: .75rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 20px;
    backdrop-filter: blur(4px);
}

.gtrip-card-body {
    padding: 20px 20px 16px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.gtrip-card-destination {
    font-size: .78rem;
    font-weight: 600;
    color: #E65100;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-bottom: 4px;
}
.gtrip-card-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: #1A1A1A;
    margin-bottom: 4px;
    line-height: 1.25;
}
.gtrip-card-subtitle {
    font-size: .82rem;
    color: #666;
    margin-bottom: 8px;
}
.gtrip-card-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    font-size: .78rem;
    color: #555;
    margin-bottom: 10px;
}
.gtrip-card-highlights {
    list-style: none;
    padding: 0;
    margin: 0 0 10px;
}
.gtrip-card-highlights li {
    font-size: .8rem;
    color: #444;
    margin-bottom: 3px;
}
.gtrip-card-spots { margin-bottom: 12px; }

.gtrip-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 8px;
    border-top: 1px solid #f0f0f0;
    padding-top: 12px;
    margin-top: auto;
}
.gtrip-card-price { display: flex; align-items: baseline; gap: 4px; flex-wrap: wrap; }
.gtrip-price-from { font-size: .75rem; color: #888; }
.gtrip-price-main { font-size: 1.15rem; font-weight: 700; color: #1B5E20; }
.gtrip-price-pp { font-size: .72rem; color: #888; }

/* CTA Section */
.gtrip-cta-section {
    background: linear-gradient(135deg, #1B5E20 0%, #2E7D32 50%, #E65100 100%);
    position: relative;
    overflow: hidden;
}
.gtrip-cta-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -10%;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: rgba(255,255,255,.05);
}
</style>
