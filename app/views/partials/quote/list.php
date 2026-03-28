<?php
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;

$status_badges = [
    'new'     => '<span class="badge bg-danger">New</span>',
    'read'    => '<span class="badge bg-warning text-dark">Read</span>',
    'replied' => '<span class="badge bg-success">Replied</span>',
    'closed'  => '<span class="badge bg-secondary">Closed</span>',
];
?>
<section class="page" id="<?= $page_element_id ?>" data-page-type="list" data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php $this::display_page_errors(); ?>

    <div class="table-responsive animated fadeIn">
        <table class="table table-striped table-sm">
            <thead class="table-header bg-light">
                <tr>
                    <th class="td-checkbox">
                        <label class="custom-control custom-checkbox custom-control-inline">
                            <input class="toggle-check-all custom-control-input" type="checkbox" />
                            <span class="custom-control-label"></span>
                        </label>
                    </th>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Destinations</th>
                    <th>Travelers</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <?php if (!empty($records)): ?>
            <tbody class="page-data" id="page-data-<?= $page_element_id ?>">
                <?php
                $counter = 0;
                foreach ($records as $row):
                    $rec_id = urlencode($row['id']);
                    $counter++;
                    $badge = $status_badges[$row['status']] ?? '<span class="badge bg-secondary">' . htmlspecialchars($row['status']) . '</span>';
                    $is_new = $row['status'] === 'new';
                ?>
                <tr class="<?= $is_new ? 'fw-bold' : '' ?>">
                    <th class="td-checkbox">
                        <label class="custom-control custom-checkbox custom-control-inline">
                            <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?= $row['id'] ?>" type="checkbox" />
                            <span class="custom-control-label"></span>
                        </label>
                    </th>
                    <th><?= $counter ?></th>
                    <td>
                        <a href="<?php print_link("quote/view/$rec_id") ?>">
                            <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?>
                        </a>
                    </td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['destinations'] ?: '—') ?></td>
                    <td><?= htmlspecialchars($row['travelers'] ?: '—') ?></td>
                    <td><?= $badge ?></td>
                    <td><?= human_datetime($row['created_date']) ?></td>
                    <td>
                        <a class="btn btn-sm btn-success" href="<?php print_link("quote/view/$rec_id") ?>">
                            <i class="fa fa-eye"></i> View
                        </a>
                        <a class="btn btn-sm btn-danger record-delete-btn"
                           href="<?php print_link("quote/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page") ?>"
                           data-prompt-msg="<?= get_lang('delete_confirmation') ?>" data-display-style="modal">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody class="search-data" id="search-data-<?= $page_element_id ?>"></tbody>
            <?php endif; ?>
        </table>

        <?php if (empty($records)): ?>
        <h4 class="bg-light text-center border-top text-muted p-3">
            <i class="fa fa-ban"></i> <?php print_lang('no_record_found'); ?>
        </h4>
        <?php endif; ?>
    </div>

    <?php if ($show_footer && !empty($records)): ?>
    <div class="border-top mt-2">
        <div class="row justify-content-between align-items-center p-3">
            <div class="col-auto">
                <button data-prompt-msg="<?php print_lang('are_you_sure_you_want_to_delete_these_records_'); ?>"
                        data-display-style="modal"
                        data-url="<?php print_link("quote/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page") ?>"
                        class="btn btn-sm btn-danger btn-delete-selected d-none">
                    <i class="fa fa-times"></i> <?php print_lang('delete_selected'); ?>
                </button>
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
</section>
