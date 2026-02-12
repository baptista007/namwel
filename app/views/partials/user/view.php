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
<section class="page">
    <?php
    if ($show_header == true) {
        HTML::addGoBackButtonRow();
    }
    ?>
    <div  class="">
        <div class="row ">
            <div class="col-lg-12">
                <div  class="card animated fadeIn page-content">
                    <div class="card-header">
                        <h5 class="card-title">Detalhes do usuario</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-borderless table-striped">
                            <!-- Table Body Start -->
                            <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                <tr  class="td-name">
                                    <th class="title"> <?= get_lang('name') ?>: </th>
                                    <td class="value"> 
                                        <?php echo $data['name']; ?> 
                                    </td>
                                </tr>
                                <tr  class="td-name">
                                    <th class="title"> <?= get_lang('surname') ?>: </th>
                                    <td class="value">
                                        <?php echo $data['surname']; ?> 
                                    </td>
                                </tr>
                                <tr  class="td-name">
                                    <th class="title"> <?= get_lang('username') ?>: </th>
                                    <td class="value">
                                        <?= human_datetime($data['username']) ?> 
                                    </td>
                                </tr>
                                <tr  class="td-name">
                                    <th class="title"> <?= get_lang('user_email') ?>: </th>
                                    <td class="value">
                                        <?= human_datetime($data['user_email']) ?> 
                                    </td>
                                </tr>
                                <tr  class="td-name">
                                    <th class="title"> <?= get_lang('status') ?>: </th>
                                    <td class="value">
                                        <?= $this->addTdContSafe('user_account_status', $data, $comp_model->get_field_options_value_name(FieldOptions::status)) ?> 
                                    </td>
                                </tr>
                                <tr  class="td-created">
                                    <th class="title"> <?= get_lang('date_created') ?>: </th>
                                    <td class="value"> <?= human_datetime($data['created']) ?></td>
                                </tr>
                                <tr  class="td-updatetd">
                                    <th class="title"> <?= get_lang('date_modified') ?>: </th>
                                    <td class="value"> <?= human_datetime($data['modified']); ?></td>
                                </tr>
                            </tbody>
                            <!-- Table Body End -->
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 d-flex">
            <?php
            if ($data['is_super_user'] != YesNo::yes) {
                Html::page_link('users/edit/' . $data['id'], '<i class="fa fa-edit"></i> ' . get_lang('edit'), "btn btn-sm btn-info has-tooltip");
                Html::page_link("users/delete/{$data['id']}/?csrf_token=$csrf_token&redirect=$current_page", '<i class="fa fa-times"></i> ' . get_lang('delete'), "btn btn-sm btn-danger mx-1 actionRequiresConfirmation has-tooltip");
            }
            ?>
        </div>
    </div>
</section>
