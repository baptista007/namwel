<style>
    .info-head h1 {
        font-size: 172px;
        font-weight: bold;
        color: red;
    }
</style>
<div class="container">
    <div class="info-head text-center">
        <h1 class="my-3">403</h1>
        <h2 class="text-muted"><?= get_lang('error_403_title') ?></h2>
    </div>
    <div class="my-3">
        <div class="text-center">
            <h2 class="text-danger mb-2"><?= get_lang('error_403_msg') ?></h2>
            <div class="text-muted"><small><?= get_lang('error_403_sub') ?></small></div>
            <hr />
            <a href="<?php print_link(HOME_PAGE); ?>" class="btn btn-primary"><?= get_lang('error_403_go_home') ?></a>
        </div>
    </div>
</div>