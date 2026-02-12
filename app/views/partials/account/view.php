<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
        ?>
        <div  class="bg-light p-3 mb-3">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col ">
                        <h4 class="record-title">
                            <?= get_lang('my_account') . ' : ' . $data['name'] ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="container-fluid">
        <div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mx-3 mb-3">
                        <ul class="nav nav-pills flex-column text-left">
                            <li class="nav-item">
                                <a data-toggle="tab" href="#AccountPageView" class="nav-link active">
                                    <i class="fa fa-user"></i> <?php print_lang('account_detail'); ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#AccountPageEdit" class="nav-link">
                                    <i class="fa fa-edit"></i> <?php print_lang('edit_account'); ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#AccountPageChangePassword" class="nav-link">
                                    <i class="fa fa-key"></i> <?php print_lang('change_password'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="mb-3">
                        <div class="tab-content">
                            <div class="tab-pane show active fade" id="AccountPageView" role="tabpanel">
                                <h4><?= get_lang('account_detail') ?></h4>
                                <hr />
                                <table class="table table-hover table-borderless table-striped">
                                    <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                        <tr  class="td-FirstName">
                                            <th class="title"> <?php print_lang('name'); ?>: </th>
                                            <td class="value">
                                                <?= $data['name'] ?>
                                            </td>
                                        </tr>
                                        <tr  class="td-FirstName">
                                            <th class="title"> <?php print_lang('surname'); ?>: </th>
                                            <td class="value">
                                                <?= $data['surname'] ?>
                                            </td>
                                        </tr>
                                        <tr  class="td-FirstName">
                                            <th class="title"> <?php print_lang('username'); ?>: </th>
                                            <td class="value">
                                                <?= $data['username'] ?>
                                            </td>
                                        </tr>
                                        <tr  class="td-FirstName">
                                            <th class="title"> <?php print_lang('email_address'); ?>: </th>
                                            <td class="value">
                                                <?= $data['user_email'] ?>
                                            </td>
                                        </tr>
                                        <tr  class="td-FirstName">
                                            <th class="title"> <?php print_lang('created'); ?>: </th>
                                            <td class="value">
                                                <?= human_datetime($data['created']) ?>
                                            </td>
                                        </tr>
                                    </tbody>    
                                </table>
                            </div>
                            <div class="tab-pane fade" id="AccountPageEdit" role="tabpanel">
                                <h4><?= get_lang('edit_account') ?></h4>
                                <hr />
                                <div class=" reset-grids">
                                    <?php $this->render_page("account/edit"); ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="AccountPageChangePassword" role="tabpanel">
                                <h4><?= get_lang('change_password') ?></h4>
                                <hr />
                                <div class=" reset-grids">
                                    <?php $this->render_page("account/change_password"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
