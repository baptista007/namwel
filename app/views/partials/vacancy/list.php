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
                <a  class="btn btn btn-primary my-1" href="<?php print_link("vacancy/add") ?>">
                    <!--<i class="fas fa-plus"></i>-->                              
                    New Vacancy
                </a> 
            </div>
        </div>
        <?php
    }
    ?>
    <div  class="">
        <div class="container-fluid"> 
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class=" animated fadeIn page-content">
                        <div id="client-list-records">
                            <div id="page-report-body" class="table-responsive">
                                <table class="table  table-striped table-sm text-left">
                                    <thead class="table-header bg-light">
                                        <tr>
                                            <th class="td-checkbox">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </th>
                                            <th  class="td-name">Title</th>
                                            <th  class="td-name">Closing date</th>
                                            <th  class="td-name">Attachment</th>
                                            <th  class="td-modified_date" > <?php print_lang('modified_date'); ?></th>
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
                                                    <th class=" td-checkbox">
                                                        <label class="custom-control custom-checkbox custom-control-inline">
                                                            <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <td class="td-id">
                                                        <a href="<?php print_link("vacancy/view/$data[id]") ?>">
                                                            <?= html_entity_decode($data['title']); ?>
                                                        </a>
                                                    </td>
                                                    <td class="td-id">
                                                        <?= html_entity_decode($data['closing_date']); ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo '<a href="' . get_link(UPLOAD_FILE_DIR . $data['file']) . '" target="_blank">';
                                                        echo $data['file_original_name'];
                                                        echo '</a>';
                                                        ?>
                                                    </td>
                                                    <td class="td-modified_date"> <?php echo $data['modified_date']; ?></td>
                                                    <th class="td-btn">
                                                        <a class="btn btn-sm btn-secondary has-tooltip" title="<?php print_lang('edit_this_record'); ?>" href="<?php print_link("vacancy/edit/$rec_id"); ?>">
                                                            <i class="fas fa-edit"></i> <?php print_lang('edit'); ?>
                                                        </a>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="<?php print_lang('delete_this_record'); ?>" href="<?php print_link("vacancy/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="<?= get_lang('delete_confirmation') ?>" data-display-style="modal">
                                                            <i class="fas fa-times"></i>
                                                            <?php print_lang('delete'); ?>
                                                        </a>
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
                                <?php
                                if (empty($records)) {
                                    ?>
                                    <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                        <i class="fas fa-ban"></i> <?php print_lang('no_record_found'); ?>
                                    </h4>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                            if ($show_footer && !empty($records)) {
                                ?>
                                <div class=" border-top mt-2">
                                    <div class="row justify-content-center">    
                                        <div class="col-md-auto justify-content-center">    
                                            <div class="p-3 d-flex justify-content-between">    
                                                <button data-prompt-msg="<?php print_lang('are_you_sure_you_want_to_delete_these_records_'); ?>" data-display-style="modal" data-url="<?php print_link("monitoring/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                    <i class="fas fa-times"></i> <?php print_lang('delete_selected'); ?>
                                                </button>
                                                <div class="dropup export-btn-holder mx-1">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-save"></i> <?php print_lang('export'); ?>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                        <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                            <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                        </a> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                </div>
            </div>
        </div>
    </div>
</section>
