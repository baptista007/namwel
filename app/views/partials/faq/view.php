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
    <div class="">
        <div class="">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                            <div class="card animated fadeIn page-content">
                                <div class="card-header">
                                    FAQ Details
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
                                                    Title:
                                                </th>
                                                <td>
                                                    <?= $data['title'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Description:
                                                </th>
                                                <td>
                                                    <?= $data['description'] ?>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    <?php
                                    } else {
                                    ?>
                                        <!-- Empty Record Message -->
                                        <div class="text-muted p-3">
                                            <i class="fas fa-ban"></i> <?php print_lang('no_record_found'); ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                    </div>
                    <div class="p-3 d-flex">
                        <a class="btn btn-sm btn-info" href="<?php print_link("faq/edit/$rec_id"); ?>">
                            <i class="fas fa-edit"></i> <?php print_lang('edit'); ?>
                        </a>
                        <a class="btn btn-sm btn-danger record-delete-btn mx-1" href="<?php print_link("faq/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                            <i class="fas fa-times"></i> <?php print_lang('delete'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>