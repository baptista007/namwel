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
    <div class="">
        <div class="">
            <div class="row ">
                <div class="col-lg-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="p-3 animated fadeIn page-content">
                        <form id="client-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("driver/manage" . (!empty($page_id) ? "/" . $page_id : "") . "?csrf_token=$csrf_token") ?>" method="post">
                            <?php
                            $comp_model->addInput([
                                'name' => 'name',
                                'type' => InputType::text,
                                'label' => 'Nome completo',
                                'required' => true,
                                'value' => $this->set_field_value('name')
                            ]);

                            $comp_model->addInput([
                                'name' => 'date_of_birth',
                                'type' => InputType::date,
                                'label' => 'Data de nascimento',
                                'required' => true,
                                'value' => $this->set_field_value('date_of_birth')
                            ]);

                            $comp_model->addInput([
                                'name' => 'id_number',
                                'type' => InputType::text,
                                'label' => 'Número do BI',
                                'required' => true,
                                'value' => $this->set_field_value('id_number')
                            ]);

                            $comp_model->addInput([
                                'name' => 'drivers_license_number',
                                'type' => InputType::text,
                                'label' => 'Número da carteira de motorista',
                                'required' => true,
                                'value' => $this->set_field_value('drivers_license_number')
                            ]);

                            $comp_model->addInput([
                                'name' => 'residential_address',
                                'type' => InputType::text,
                                'label' => 'Endereço residencial',
                                'required' => true,
                                'value' => $this->set_field_value('residential_address')
                            ]);

                            $comp_model->addInput([
                                'name' => 'cellphone_number',
                                'type' => InputType::text,
                                'label' => 'Número de celular',
                                'required' => true,
                                'value' => $this->set_field_value('cellphone_number')
                            ]);
                            ?>
                            <fieldset>
                                <legend>Documentos do motorista</legend>
                                <div>
                                    <?php
                                    $file_array = [
                                        'nationa_id' => 'Bilhete de identidade',
                                        'drivers' => 'Carta de conducao',
                                        'criminal_clearance' => 'Registo Criminal',
                                        'passport_photo' => 'Foto tipo passe'
                                    ];

                                    foreach ($file_array as $field => $label) {
                                        ?>
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <?= $label ?>
                                            </label>
                                            <div>
                                                <?php
                                                if (!empty($this->page_props[$field])) {
                                                    echo '<ul class="list-group mb-2">';
                                                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                                                    echo '<a href="' . get_link(UPLOAD_FILE_DIR . $this->page_props[$field]) . '" target="_blank">';
                                                    echo $this->page_props[$field. '_original_name'];
                                                    echo '</a>';
                                                    echo '<span class="badge badge-danger badge-pill">';
                                                    echo '<a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="' . get_lang('delete_this_record') . '" href="' . get_link("driver/delete_driver_cover_image/{$this->page_props['id']}/?csrf_token=$csrf_token&redirect=$current_page") . '" data-prompt-msg="' . get_lang('delete_confirmation') . '" data-display-style="modal">
                                                            <i class="fa fa-times"></i>' . get_lang('delete') . '
                                                        </a>';
                                                    echo '</span>';
                                                    echo '</li>';
                                                    echo '</ul>';
                                                }
                                                ?>
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="<?= $field ?>" id="<?= $field ?>">
                                                        <label class="custom-file-label" for="<?= $field ?>"><?= get_lang('choose_file') ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Detalhes do carro</legend>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">
                                            <?php
                                            $comp_model->addInput([
                                                'name' => 'make',
                                                'type' => InputType::text,
                                                'label' => 'Marca',
                                                'required' => true,
                                                'value' => $this->set_field_value('make'),
                                                'class' => 'color-picker'
                                            ]);
                                            ?>
                                        </div>
                                        <div class="col-lg-4 col-xs-12">
                                            <?php
                                            $comp_model->addInput([
                                                'name' => 'model',
                                                'type' => InputType::text,
                                                'label' => 'Modelo',
                                                'required' => true,
                                                'value' => $this->set_field_value('model'),
                                            ]);
                                            ?>
                                        </div>
                                        <div class="col-lg-4 col-xs-12">
                                            <?php
                                            $comp_model->addInput([
                                                'name' => 'color',
                                                'type' => InputType::text,
                                                'label' => 'Cor',
                                                'required' => true,
                                                'value' => $this->set_field_value('color', '')
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12">
                                            <?php
                                            $comp_model->addInput([
                                                'name' => 'type_of_car',
                                                'type' => InputType::select,
                                                'label' => 'Tipo/Categoria',
                                                'options' => $comp_model->get_field_options_from_enum(FieldOptions::car_body_type),
                                                'required' => true,
                                                'value' => $this->set_field_value('aircon'),
                                            ]);
                                            ?>
                                        </div>
                                        <div class="col-lg-4 col-xs-12">
                                            <?php
                                            $comp_model->addInput([
                                                'name' => 'seat_capacity',
                                                'type' => InputType::text,
                                                'label' => 'Numero de lugares',
                                                'required' => true,
                                                'value' => $this->set_field_value('seat_capacity'),
                                            ]);
                                            ?>
                                        </div>
                                        <div class="col-lg-4 col-xs-12">
                                            <?php
                                            $comp_model->addInput([
                                                'name' => 'aircon',
                                                'type' => InputType::select,
                                                'label' => 'Ar Condicionado',
                                                'options' => $comp_model->get_field_options_from_enum(FieldOptions::yes_no),
                                                'required' => true,
                                                'value' => $this->set_field_value('aircon'),
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Images do carro</label>
                                        <div class="col-sm-8">
                                            <?php
                                            if (!empty($this->page_props['files'])) {
                                                echo '<ul class="list-group mb-2">';

                                                foreach ($this->page_props['files'] as $file) {
                                                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                                                    echo '<a href="' . get_link(UPLOAD_FILE_DIR . $file['path']) . '" target="_blank">';
                                                    echo $file['original_name'];
                                                    echo '</a>';
                                                    echo '<span class="badge badge-danger badge-pill">';
                                                    echo '<a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="' . get_lang('delete_this_record') . '" href="' . get_link("driver/delete_driver_file/{$file['id']}/?csrf_token=$csrf_token&redirect=$current_page") . '" data-prompt-msg="' . get_lang('delete_confirmation') . '" data-display-style="modal">
                                                            <i class="fa fa-times"></i>' . get_lang('delete') . '
                                                        </a>';
                                                    echo '</span>';
                                                    echo '</li>';
                                                }

                                                echo '</ul>';
                                            }
                                            ?>
                                            <div class="field_wrapper">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="other_files[]" id="additional-photo-1">
                                                        <label class="custom-file-label" for="additional-photo-1"><?= get_lang('choose_file') ?></label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary add_button" type="button"><?= get_lang('add_new_file') ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
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
<script type="text/javascript">
    function removeImg(id) {
        alert(id);
    }

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
</script>