<?php
$view_data       = $this->view_data;
$quote_count     = $view_data->quote_count      ?? 0;
$gallery_count   = $view_data->gallery_count    ?? 0;
$vehicle_count   = $view_data->vehicle_count    ?? 0;
$testimonial_count = $view_data->testimonial_count ?? 0;
$recent_quotes   = $view_data->recent_quotes    ?? [];

$quote_status_labels = [1 => 'New', 2 => 'In Review', 3 => 'Quoted', 4 => 'Confirmed', 5 => 'Closed'];
$quote_status_classes = [1 => 'pending', 2 => 'pending', 3 => 'confirmed', 4 => 'confirmed', 5 => 'completed'];
?>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card bookings">
        <div class="stat-icon">
            <i class="fas fa-file-invoice"></i>
        </div>
        <div class="stat-value"><?= $quote_count ?></div>
        <div class="stat-label">Quote Requests</div>
    </div>

    <div class="stat-card customers">
        <div class="stat-icon">
            <i class="fas fa-star"></i>
        </div>
        <div class="stat-value"><?= $testimonial_count ?></div>
        <div class="stat-label">Testimonials</div>
    </div>

    <div class="stat-card tours">
        <div class="stat-icon">
            <i class="fas fa-bus"></i>
        </div>
        <div class="stat-value"><?= $vehicle_count ?></div>
        <div class="stat-label">Vehicles</div>
    </div>

    <div class="stat-card revenue">
        <div class="stat-icon">
            <i class="fas fa-photo-video"></i>
        </div>
        <div class="stat-value"><?= $gallery_count ?></div>
        <div class="stat-label">Gallery Items</div>
    </div>
</div>

<!-- Tables Row -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="table-card">
            <div class="chart-header">
                <h3 class="chart-title">Recent Quote Requests</h3>
                <a href="<?= get_link('quote') ?>" class="btn btn-sm btn-outline-success">View All</a>
            </div>

            <?php if (empty($recent_quotes)): ?>
            <div class="text-center py-4 text-muted">
                <i class="fas fa-file-invoice fa-2x mb-2 d-block"></i>
                No quote requests yet.
            </div>
            <?php else: ?>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Destination(s)</th>
                            <th>Travel Date</th>
                            <th>Travelers</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_quotes as $q):
                            $initials = strtoupper(substr($q['first_name'], 0, 1) . substr($q['last_name'], 0, 1));
                            $name = htmlspecialchars($q['first_name'] . ' ' . $q['last_name']);
                            $dest = htmlspecialchars($q['destinations'] ?? '—');
                            $date = !empty($q['start_date']) ? date('M j, Y', strtotime($q['start_date'])) : '—';
                            $status_id = intval($q['status'] ?? 1);
                            $status_label = $quote_status_labels[$status_id] ?? 'New';
                            $status_class = $quote_status_classes[$status_id] ?? 'pending';
                        ?>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar"><?= $initials ?></div>
                                    <div>
                                        <span><?= $name ?></span>
                                        <small class="d-block text-muted"><?= htmlspecialchars($q['email'] ?? '') ?></small>
                                    </div>
                                </div>
                            </td>
                            <td><?= $dest ?></td>
                            <td><?= $date ?></td>
                            <td><?= htmlspecialchars($q['travelers'] ?? '—') ?></td>
                            <td><span class="status-badge <?= $status_class ?>"><?= $status_label ?></span></td>
                            <td>
                                <div class="action-btns">
                                    <a href="<?= get_link('quote/view/' . $q['id']) ?>" class="action-btn view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="table-card">
            <div class="chart-header">
                <h3 class="chart-title">Quick Actions</h3>
            </div>
            <div class="quick-actions">
                <a href="<?= get_link('vehicles') ?>" class="quick-btn">
                    <i class="fas fa-bus"></i>
                    <span>Vehicles</span>
                </a>
                <a href="<?= get_link('gallery') ?>" class="quick-btn">
                    <i class="fas fa-photo-video"></i>
                    <span>Gallery</span>
                </a>
                <a href="<?= get_link('quote') ?>" class="quick-btn">
                    <i class="fas fa-file-invoice"></i>
                    <span>Quotes</span>
                </a>
                <a href="<?= get_link('testimonial') ?>" class="quick-btn">
                    <i class="fas fa-star"></i>
                    <span>Reviews</span>
                </a>
                <a href="<?= get_link('admin/core') ?>" class="quick-btn">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
                <a href="<?= get_link('user') ?>" class="quick-btn">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </div>
        </div>
    </div>
</div>
