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
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view" data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
    ?>
        <div class="bg-light p-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div class="col ">
                        <h4 class="record-title">
                            View public entity
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card animated fadeIn page-content">
                                <div class="card-header">
                                    Entity Details
                                </div>
                                <div class="card-body">
                                    <?php
                                    $counter = 0;
                                    if (!empty($data)) {
                                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                        $counter++;
                                    ?>
                                        <table class="table table-striped">
                                            <tr>
                                                <th>
                                                    Name:
                                                </th>
                                                <td>
                                                    <?= $data['name'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Short Name:
                                                </th>
                                                <td>
                                                    <?= $data['short_name'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Physical Address:
                                                </th>
                                                <td>
                                                    <?= $data['physical_address'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Telephone:
                                                </th>
                                                <td>
                                                    <?= $data['telephone'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Email:
                                                </th>
                                                <td>
                                                    <?= $data['email'] ?>
                                                </td>
                                            </tr>
                                        </table>
                                    <?php
                                    } else {
                                    ?>
                                        <!-- Empty Record Message -->
                                        <div class="text-muted p-3">
                                            <i class="fa fa-ban"></i> <?php print_lang('no_record_found'); ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card animated fadeIn page-content">
                                <div class="card-header">
                                    Authorised Users
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <button class="btn btn-primary" onclick="openModalRemoteContent('<?= get_link('institutions/add_user/' . $data['id']) ?>', 'Add Institutional User')">
                                            Add User
                                        </button>
                                    </div>
                                    <?php
                                        if ($data['users']) {
                                            echo '<table class="table  table-striped table-sm text-left">
                                                        <thead class="table-header bg-light">
                                                            <tr>
                                                                <th class="td-sno">Name</th>
                                                                <th class="td-sno">Surname</th>
                                                                <th class="td-sno">Email Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>';

                                            foreach ($data['users'] as $user) {
                                                echo '<tr>';
                                                echo '<td>';
                                                echo $user['name'];
                                                echo '</td>';
                                                echo '<td>';
                                                echo $user['surname'];
                                                echo '</td>';
                                                echo '<td>';
                                                echo $user['user_email'];
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                                        
                                            echo '</tbody>
                                                    </table>';

                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 d-flex">
                        <a class="btn btn-sm btn-info" href="<?php print_link("eproc_institutions/edit/$rec_id"); ?>">
                            <i class="fa fa-edit"></i> <?php print_lang('edit'); ?>
                        </a>
                        <a class="btn btn-sm btn-danger record-delete-btn mx-1" href="<?php print_link("eproc_institutions/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="<?= get_lang('delete_confirmation') ?>" data-display-style="modal">
                            <i class="fa fa-times"></i> <?php print_lang('delete'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>