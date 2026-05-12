<?php
$page_element_id  = "list-page-" . random_str();
$current_page     = $this->set_current_page_link();
$csrf_token       = Csrf::$token;
$view_data        = $this->view_data;
$records          = $view_data->records;
$record_count     = $view_data->record_count;
$total_records    = $view_data->total_records;
$show_header      = $this->show_header;
$show_footer      = $this->show_footer;
$show_pagination  = $this->show_pagination;

// Body type labels
$body_type_labels = [
    CarBodyType::sedan        => get_lang('fleet_body_sedan'),
    CarBodyType::suv          => get_lang('fleet_body_suv'),
    CarBodyType::pickup_truck => get_lang('fleet_body_pickup'),
];
$status_labels = [
    Status::active   => ['label' => get_lang('fleet_status_active'),   'class' => 'bg-success'],
    Status::inactive => ['label' => get_lang('fleet_status_inactive'), 'class' => 'bg-secondary'],
];
?>
<section class="page" id="<?= $page_element_id ?>" data-page-type="list" data-display-type="table"
         data-page-url="<?php print_link($current_page); ?>">

    <?php if ($show_header): ?>
    <div class="bg-light p-3 mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
        <a class="btn btn-primary" href="<?php print_link('vehicles/add') ?>">
            <i class="fas fa-plus me-1"></i> <?= get_lang('fleet_add') ?>
        </a>
        <small class="text-muted"><?= $total_records ?> <?= get_lang('fleet_vehicles_total') ?></small>
    </div>
    <?php endif; ?>

    <div>
        <?php $this::display_page_errors(); ?>
        <div class="animated fadeIn page-content">
            <div id="vehicle-list-records">
                <div id="page-report-body" class="table-responsive">
                    <table class="table table-striped table-sm align-middle">
                        <thead class="table-header bg-light">
                            <tr>
                                <th class="td-checkbox">
                                    <label class="custom-control custom-checkbox custom-control-inline mb-0">
                                        <input class="toggle-check-all custom-control-input" type="checkbox">
                                        <span class="custom-control-label"></span>
                                    </label>
                                </th>
                                <th><?= get_lang('fleet_image') ?></th>
                                <th><?= get_lang('fleet_make_model') ?></th>
                                <th><?= get_lang('fleet_year') ?></th>
                                <th><?= get_lang('fleet_body_type') ?></th>
                                <th><?= get_lang('fleet_seats') ?></th>
                                <th><?= get_lang('fleet_transmission') ?></th>
                                <th><?= get_lang('fleet_price_per_day') ?></th>
                                <th><?= get_lang('fleet_status') ?></th>
                                <th class="td-btn"></th>
                            </tr>
                        </thead>

                        <?php if (!empty($records)): ?>
                        <tbody class="page-data" id="page-data-<?= $page_element_id ?>">
                            <?php foreach ($records as $data):
                                $rec_id = urlencode($data['id']);
                                $bt     = $body_type_labels[$data['body_type']] ?? $data['body_type'];
                                $st     = $status_labels[$data['status']]      ?? ['label' => $data['status'], 'class' => 'bg-secondary'];
                                $trans  = ucfirst($data['transmission']);
                            ?>
                            <tr>
                                <td class="td-checkbox">
                                    <label class="custom-control custom-checkbox custom-control-inline mb-0">
                                        <input class="optioncheck custom-control-input" name="optioncheck[]"
                                               value="<?= $data['id'] ?>" type="checkbox">
                                        <span class="custom-control-label"></span>
                                    </label>
                                </td>
                                <td>
                                    <?php if (!empty($data['cover_image'])): ?>
                                        <img src="<?= get_link(UPLOAD_FILE_DIR . $data['cover_image']) ?>"
                                             style="height:56px;width:80px;object-fit:cover;border-radius:4px;"
                                             alt="<?= htmlspecialchars($data['make'] . ' ' . $data['model']) ?>">
                                    <?php else: ?>
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                             style="height:56px;width:80px;">
                                            <i class="fas fa-car text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="fw-semibold">
                                    <?= htmlspecialchars($data['make'] . ' ' . $data['model']) ?>
                                </td>
                                <td><?= htmlspecialchars($data['year']) ?></td>
                                <td><?= $bt ?></td>
                                <td><?= $data['seats'] ?></td>
                                <td><?= $trans ?></td>
                                <td class="fw-bold text-primary">
                                    $<?= number_format($data['price_per_day'], 2) ?>/<?= get_lang('fleet_day') ?>
                                </td>
                                <td>
                                    <span class="badge <?= $st['class'] ?>"><?= $st['label'] ?></span>
                                </td>
                                <td class="td-btn text-nowrap">
                                    <a class="btn btn-sm btn-info"
                                       href="<?php print_link("vehicles/edit/$rec_id") ?>"
                                       title="<?= get_lang('edit') ?>">
                                        <i class="fa fa-edit"></i> <?= get_lang('edit') ?>
                                    </a>
                                    <a class="btn btn-sm btn-outline-secondary"
                                       href="<?php print_link("vehicles/toggle_status/$rec_id/?csrf_token=$csrf_token") ?>"
                                       title="<?= get_lang('fleet_toggle_status') ?>">
                                        <i class="fas fa-toggle-<?= ($data['status'] == Status::active ? 'on text-success' : 'off text-secondary') ?>"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger record-delete-btn"
                                       href="<?php print_link("vehicles/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page") ?>"
                                       data-prompt-msg="<?= get_lang('delete_confirmation') ?>"
                                       data-display-style="modal"
                                       title="<?= get_lang('delete') ?>">
                                        <i class="fa fa-times"></i> <?= get_lang('delete') ?>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tbody class="search-data" id="search-data-<?= $page_element_id ?>"></tbody>
                        <?php endif; ?>
                    </table>

                    <?php if (empty($records)): ?>
                    <h4 class="bg-light text-center border-top text-muted p-4">
                        <i class="fa fa-ban me-2"></i><?= get_lang('no_record_found') ?>
                    </h4>
                    <?php endif; ?>
                </div>

                <?php if ($show_footer && !empty($records)): ?>
                <div class="border-top mt-2">
                    <div class="row justify-content-center">
                        <div class="col">
                            <?php if ($show_pagination): ?>
                                <?php
                                $pager = new Pagination($total_records, $record_count);
                                $pager->route               = $this->route;
                                $pager->show_page_count     = true;
                                $pager->show_record_count   = true;
                                $pager->show_page_limit     = true;
                                $pager->limit_count         = $this->limit_count;
                                $pager->show_page_number_list = true;
                                $pager->pager_link_range    = 5;
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
</section>
