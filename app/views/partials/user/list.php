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
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
        ?>
        <div  class="bg-light p-3 mb-3">
            <div class="col-sm-3 ">
                <a  class="btn btn btn-primary my-1" href="<?php print_link("user/add") ?>">
                    <i class="fa fa-plus"></i>                              
                    <?= get_lang('new_user') ?>
                </a>
            </div>
        </div>
        <?php
    }
    ?>
    <div  class="">
        <?php $this :: display_page_errors(); ?>
        <div  class=" animated fadeIn page-content container-fluid">
            <?php
            if (!empty($records)) {
                ?>
                <div id="tbl_users-list-records">
                    <div id="page-report-body" class="table-responsive">
                        <table class="table  table-striped table-sm text-left">
                            <thead class="table-header bg-light">
                                <tr>
                                    <th  class="td-name"><?= get_lang('name') ?></th>
                                    <th  class="td-surname"><?= get_lang('surname') ?></th>
                                    <th  class="td-username"><?= get_lang('username') ?></th>
                                    <th  class="td-user_email"><?= get_lang('email_address') ?></th>
                                    <th  class="td-user_account_status"><?= get_lang('status') ?></th>
                                    <th  class="td-created"><?= get_lang('date_created') ?></th>
                                    <th class="td-btn"></th>
                                </tr>
                            </thead>
                            <?php
                            if (!empty($records)) {
                                ?>
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <!--record-->
                                    <?php
                                    $counter = 0;
                                    foreach ($records as $data) {
                                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                        $counter++;
                                        ?>
                                        <tr>
                                            <td class="td-name">
                                                <?php echo $data['name']; ?> 
                                            </td>
                                            <td class="td-surname">
                                                <?php echo $data['surname']; ?> 
                                            </td>
                                            <td class="td-username">
                                                <?php echo $data['username']; ?> 
                                            </td>
                                            <td class="td-user_email"><a href="<?php print_link("mailto:$data[user_email]") ?>"><?php echo $data['user_email']; ?></a></td>
                                            <td class="td-created">
                                                <?= human_datetime($data['created']) ?> 
                                                </span>
                                            </td>
                                            <th class="td-btn">
                                                <?php
                                                Html::page_link('user/view/' . $data['id'], '<i class="fa fa-eye"></i> ' . get_lang('view'), "btn btn-sm btn-success has-tooltip");
                                                Html::page_link('user/edit/' . $data['id'], '<i class="fa fa-edit"></i> ' . get_lang('edit'), "btn btn-sm btn-info has-tooltip");
                                                Html::page_link("user/delete/{$data['id']}/?csrf_token=$csrf_token&redirect=$current_page", '<i class="fa fa-times"></i> ' . get_lang('delete'), "btn btn-sm btn-danger actionRequiresConfirmation has-tooltip");
                                                ?>
                                            </th>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <!--endrecord-->
                                </tbody>
                                <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <?php
                    if ($show_footer) {
                        ?>
                        <div class=" border-top mt-2">
                            <div class="row justify-content-center">    
                                <div class="col">   
                                    <?php
                                    if ($show_pagination == true) {
                                        $pager = new Pagination($total_records, $record_count);
                                        $pager->route = $this->route;
                                        $pager->show_page_count = true;
                                        $pager->show_record_count = true;
                                        $pager->show_page_limit = true;
                                        $pager->limit_count = $this->limit_count;
                                        $pager->show_page_number_list = true;
                                        $pager->pager_link_range = 5;
                                        $pager->render();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        } else {
            $this->addNoDataFoundMsg(get_lang('no_data_found'), "text-muted animated bounce");
        }
        ?>
    </div>
</section>
