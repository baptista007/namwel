<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$page_id = $this->route->page_id;
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type="" data-page-url="<?php print_link($current_page); ?>" ng-controller="ManagedriverCtrl">
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">
                        <?= get_lang('new_driver') ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="p-3 animated fadeIn page-content">
                        <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("driver/manage" . (!empty($page_id) ? "/" . $page_id : "") . "?csrf_token=$csrf_token") ?>" method="post">
                            <section id="driver-landing-page">


                            </section>
                            <div class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
                                    Add Element
                                </button>
                            </div>
                            
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <div class="form-ajax-status"></div>
                                <button class="btn btn-primary" type="submit">
                                    <?php print_lang('submit'); ?>
                                    <i class="fa fa-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="templates" class="d-none">
    <section class="text-editor">
        <textarea class="ckeditor"></textarea>
    </section>
</section>
<script type="text/javascript">
    $(function () {
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="input-group mb-3">' +
                '<div class="custom-file">' +
                '<input type="file" class="custom-file-input" name="other_files[]">' +
                '<label class="custom-file-label"><?= get_lang('choose_file') ?></label>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-danger remove_button" type="button"><?= get_lang('delete') ?></button>' +
                '</div>' +
                '</div>';
        $(addButton).click(function () {
            $(wrapper).append(fieldHTML);
        });
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            console.log('Clicked!');
            $(this).closest('.input-group').remove();
        });
    });

<?php
if ($this->page_props['testimonials']) {
    ?>
        try {
            var testimonials = JSON.parse('<?= json_encode($this->page_props['testimonials']) ?>');
        } catch (exception) {

        }
    <?php
}
?>

<?php
if ($this->page_props['features']) {
    ?>
        try {
            var features = JSON.parse('<?= json_encode($this->page_props['features']) ?>');
        } catch (exception) {

        }
    <?php
}
?>
    
    
    function addText() {
        $('#templates .text-editor').clone().appendTo("#driver-landing-page");
    }
    
    function addVideo() {
        
    }
    
    function addCallToAction() {
        
    }
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Element</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <a class="element-anchor" href="javascript:void(0)" onclick="addText()">
                            <div class="card border-light">
                                <div class="card-body">
                                    Texto
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a class="element-anchor" href="javascript:void(0)">
                            <div class="card border-light">
                                <div class="card-body">
                                    Video
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a class="element-anchor" href="javascript:void(0)">
                            <div class="card border-light">
                                <div class="card-body">
                                    Call to action
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>