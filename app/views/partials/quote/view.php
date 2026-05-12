<?php
$data = $this->view_data;
$rec_id = urlencode($data['id']);
$csrf_token = Csrf::$token;

$status_options = [
    'new'     => get_lang('status_new'),
    'read'    => get_lang('status_read'),
    'replied' => get_lang('status_replied'),
    'closed'  => get_lang('status_closed'),
];
$status_classes = [
    'new'     => 'bg-danger',
    'read'    => 'bg-warning text-dark',
    'replied' => 'bg-success',
    'closed'  => 'bg-secondary',
];
$current_status = $data['status'] ?? 'new';
?>
<section class="page" data-page-type="view">
    <?php $this::display_page_errors(); ?>

    <!-- Toolbar -->
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <a class="btn btn-secondary btn-sm" href="<?php print_link("quote") ?>">
            <i class="fa fa-arrow-left"></i > <?= get_lang('quote_all_quotes') ?>
        </a>
        <div class="d-flex gap-2 align-items-center flex-wrap">
            <span class="badge <?= $status_classes[$current_status] ?? 'bg-secondary' ?> fs-6">
                <?= $status_options[$current_status] ?? ucfirst($current_status) ?>
            </span>
            <?php foreach ($status_options as $val => $label):
                if ($val === $current_status) continue; ?>
            <a class="btn btn-sm btn-outline-secondary"
               href="<?php print_link("quote/setstatus/$rec_id?s=$val&csrf_token=$csrf_token") ?>">
                <?= get_lang('quote_mark_as') ?> <?= $label ?>
            </a>
            <?php endforeach; ?>
            <a class="btn btn-sm btn-danger record-delete-btn"
               href="<?php print_link("quote/delete/$rec_id?csrf_token=$csrf_token&redirect=quote") ?>"
               data-prompt-msg="<?= get_lang('delete_confirmation') ?>" data-display-style="modal">
                <i class="fa fa-trash"></i > <?= get_lang('quote_delete') ?>
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- Contact Info -->
        <div class="col-md-5">
            <div class="card h-100">
                <div class="card-header fw-bold"><i class="fa fa-user me-2"></i><?= get_lang('quote_contact_details') ?></div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4"><?= get_lang('quote_name') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['first_name'] . ' ' . $data['last_name']) ?></dd>

                        <dt class="col-sm-4"><?= get_lang('quote_email') ?></dt>
                        <dd class="col-sm-8">
                            <a href="mailto:<?= htmlspecialchars($data['email']) ?>"><?= htmlspecialchars($data['email']) ?></a>
                        </dd>

                        <?php if (!empty($data['phone'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_phone') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['phone']) ?></dd>
                        <?php endif; ?>

                        <?php if (!empty($data['country'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_country') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['country']) ?></dd>
                        <?php endif; ?>

                        <?php if (!empty($data['referral'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_referral') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['referral']) ?></dd>
                        <?php endif; ?>

                        <dt class="col-sm-4"><?= get_lang('quote_received') ?></dt>
                        <dd class="col-sm-8"><?= human_datetime($data['created_date']) ?></dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Trip Details -->
        <div class="col-md-7">
            <div class="card h-100">
                <div class="card-header fw-bold"><i class="fa fa-map me-2"></i><?= get_lang('quote_trip_details') ?></div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <?php if (!empty($data['destinations'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_destinations') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['destinations']) ?></dd>
                        <?php endif; ?>

                        <?php if (!empty($data['trip_type'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_trip_type') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['trip_type']) ?></dd>
                        <?php endif; ?>

                        <?php if (!empty($data['accommodation'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_accommodation') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['accommodation']) ?></dd>
                        <?php endif; ?>

                        <dt class="col-sm-4"><?= get_lang('quote_travelers') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['travelers'] ?: '—') ?></dd>

                        <?php if (!empty($data['start_date'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_start_date') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['start_date']) ?></dd>
                        <?php endif; ?>

                        <?php if (!empty($data['end_date'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_end_date') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['end_date']) ?></dd>
                        <?php endif; ?>

                        <?php if (!empty($data['date_flexibility'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_flexibility') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['date_flexibility']) ?></dd>
                        <?php endif; ?>

                        <?php if (!empty($data['budget'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_budget_pp') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['budget']) ?></dd>
                        <?php endif; ?>

                        <?php if (!empty($data['interests'])): ?>
                        <dt class="col-sm-4"><?= get_lang('quote_interests') ?></dt>
                        <dd class="col-sm-8"><?= htmlspecialchars($data['interests']) ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Additional Notes -->
        <?php if (!empty($data['message'])): ?>
        <div class="col-12">
            <div class="card">
                <div class="card-header fw-bold"><i class="fa fa-comment me-2"></i><?= get_lang('quote_additional_notes') ?></div>
                <div class="card-body">
                    <p class="mb-0" style="white-space: pre-wrap;"><?= htmlspecialchars($data['message']) ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Quick Reply -->
        <div class="col-12">
            <div class="card">
                <div class="card-header fw-bold"><i class="fa fa-envelope me-2"></i><?= get_lang('quote_reply_via_email') ?></div>
                <div class="card-body">
                    <a class="btn btn-primary"
                       href="mailto:<?= htmlspecialchars($data['email']) ?>?subject=<?= urlencode(get_lang('quote_email_subject')) ?>">
                        <i class="fa fa-envelope"></i>
                        <?= get_lang('quote_reply_to') ?> <?= htmlspecialchars($data['first_name']) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
