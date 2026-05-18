<?php
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;

$status_labels = [1 => 'Active', 3 => 'Inactive'];
$status_classes = [1 => 'success', 3 => 'secondary'];
?>
<section class="page" id="<?= $page_element_id ?>" data-page-type="list" data-display-type="table" data-page-url="<?php print_link($current_page); ?>">

    <?php if ($show_header): ?>
    <div class="bg-light p-3 mb-3 d-flex align-items-center gap-2">
        <a class="btn btn-primary" href="<?php print_link('guaranteedtrip/add') ?>">
            <i class="fas fa-plus"></i> <?= get_lang('gtrip_add') ?>
        </a>
        <a class="btn btn-outline-secondary" href="<?= get_link('trips') ?>" target="_blank">
            <i class="fas fa-external-link-alt"></i> <?= get_lang('gtrip_view_public') ?>
        </a>
    </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 comp-grid">
                <?php $this::display_page_errors(); ?>
                <div class="animated fadeIn page-content">
                    <div id="client-list-records">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm text-left">
                                <thead class="table-header bg-light">
                                    <tr>
                                        <th class="td-checkbox">
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </th>
                                        <th><?= get_lang('gtrip_col_title') ?></th>
                                        <th><?= get_lang('gtrip_col_destination') ?></th>
                                        <th><?= get_lang('gtrip_col_departure') ?></th>
                                        <th><?= get_lang('gtrip_col_spots') ?></th>
                                        <th><?= get_lang('gtrip_col_price') ?></th>
                                        <th><?= get_lang('gtrip_col_status') ?></th>
                                        <th class="td-btn"></th>
                                    </tr>
                                </thead>
                                <?php if (!empty($records)): ?>
                                <tbody class="page-data" id="page-data-<?= $page_element_id ?>">
                                    <?php foreach ($records as $data):
                                        $rec_id = urlencode($data['id']);
                                        $st = intval($data['status']);
                                        $badge_class = $status_classes[$st] ?? 'secondary';
                                        $badge_label = $status_labels[$st] ?? '—';
                                        $spots_left = intval($data['spots_left']);
                                        $spots_avail = intval($data['spots_available']);
                                        $spots_class = ($spots_left <= 3 && $spots_left > 0) ? 'text-danger fw-bold' : '';
                                    ?>
                                    <tr>
                                        <td class="td-checkbox">
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?= $data['id'] ?>" type="checkbox" />
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <strong><?= html_entity_decode($data['title']) ?></strong>
                                            <?php if (!empty($data['badge'])): ?>
                                                <br><span class="badge bg-warning text-dark"><?= htmlspecialchars($data['badge']) ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($data['destination'] ?? '—') ?></td>
                                        <td>
                                            <?= !empty($data['departure_date']) ? date('d M Y', strtotime($data['departure_date'])) : '—' ?>
                                            <?php if (!empty($data['duration'])): ?>
                                                <br><small class="text-muted"><?= htmlspecialchars($data['duration']) ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <td class="<?= $spots_class ?>">
                                            <?= $spots_left ?> / <?= $spots_avail ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($data['price_label'])): ?>
                                                <?= htmlspecialchars($data['price_label']) ?>
                                            <?php elseif (!empty($data['price'])): ?>
                                                <?= htmlspecialchars($data['price_currency'] ?? 'USD') ?> <?= number_format($data['price'], 0) ?>
                                            <?php else: ?>
                                                —
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="badge bg-<?= $badge_class ?>"><?= $badge_label ?></span></td>
                                        <td class="td-btn text-nowrap">
                                            <a class="btn btn-sm btn-secondary" href="<?php print_link("guaranteedtrip/edit/$rec_id") ?>">
                                                <i class="fas fa-edit"></i> <?php print_lang('edit'); ?>
                                            </a>
                                            <a class="btn btn-sm btn-danger record-delete-btn" href="<?php print_link("guaranteedtrip/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page") ?>" data-prompt-msg="<?= get_lang('delete_confirmation') ?>" data-display-style="modal">
                                                <i class="fas fa-times"></i> <?php print_lang('delete'); ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tbody class="search-data" id="search-data-<?= $page_element_id ?>"></tbody>
                                <?php endif; ?>
                            </table>

                            <?php if (empty($records)): ?>
                            <h4 class="bg-light text-center border-top text-muted p-3 animated bounce">
                                <i class="fas fa-ban"></i> <?php print_lang('no_record_found'); ?>
                            </h4>
                            <?php endif; ?>
                        </div>

                        <?php if ($show_footer && !empty($records)): ?>
                        <div class="border-top mt-2">
                            <div class="row justify-content-center">
                                <div class="col-md-auto justify-content-center">
                                    <div class="p-3 d-flex justify-content-between">
                                        <button data-prompt-msg="<?php print_lang('are_you_sure_you_want_to_delete_these_records_'); ?>" data-display-style="modal" data-url="<?php print_link("guaranteedtrip/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                            <i class="fas fa-times"></i> <?php print_lang('delete_selected'); ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="col">
                                    <?php if ($show_pagination): ?>
                                    <?php
                                        $pager = new Pagination($total_records, $record_count);
                                        $pager->route = $this->route;
                                        $pager->show_page_count = true;
                                        $pager->show_record_count = true;
                                        $pager->show_page_limit = true;
                                        $pager->limit_count = $this->limit_count;
                                        $pager->show_page_number_list = true;
                                        $pager->pager_link_range = 5;
                                        $pager->render();
                                    ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
