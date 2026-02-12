<?php

/**
 * Eproc_contractors Page Controller
 * @category  Controller
 */
class GalleryController extends SecureController {

    function __construct() {
        parent::__construct();
        $this->tablename = SqlTables::tbl_gallery_item;
        $this->fields = [
            "id",
            "type",
            "path",
            "original_name",
            "alt",
            "created_date",
            "modified_date"
        ];
    }

    /**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
    function index($fieldname = null, $fieldvalue = null) {
        $request = $this->request;
        $db = $this->GetModel();
        $tablename = $this->tablename;
        $pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
        //search table record
        if (!empty($request->search)) {
            $text = trim($request->search);
            $search_condition = "(
				tbl_gallery_item.id LIKE ? OR 
				tbl_gallery_item.name LIKE ? OR 
				tbl_gallery_item.description LIKE ? 
			)";
            $search_params = array(
                "%$text%", "%$text%", "%$text%"
            );
            //setting search conditions
            $db->where($search_condition, $search_params);
            //template to use when ajax search
            $this->view->search_template = "gallery/search.php";
        }

        if (!empty($request->orderby)) {
            $orderby = $request->orderby;
            $ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
            $db->orderBy($orderby, $ordertype);
        } else {
            $db->orderBy("tbl_gallery_item.id", ORDER_TYPE);
        }

        if ($fieldname) {
            $db->where($fieldname, $fieldvalue); //filter by a single field name
        }

        $tc = $db->withTotalCount();
        $records = $db->get($tablename, $pagination, $this->fields);
        $records_count = count($records);
        $total_records = intval($tc->totalCount);
        $page_limit = $pagination[1];
        $total_pages = ceil($total_records / $page_limit);
        $data = new stdClass;
        $data->records = $records;
        $data->record_count = $records_count;
        $data->total_records = $total_records;
        $data->total_page = $total_pages;
        if ($db->getLastError()) {
            $this->set_page_error();
        }
        $this->view->page_title = get_lang('gallery_title');
        $this->render_view("gallery/list.php", $data); //render the full page
    }

    function new_gallery($rec_id = null) {
        $db = $this->GetModel();

        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);

            $this->rules_array = [];

            $this->sanitize_array = array(
                'alt' => 'sanitize_string',
            );

            $this->filter_vals = true; //set whether to remove empty fields
            $modeldata = $this->modeldata = $this->validate_form($postdata);

            if (!empty($this->view->page_error)) {
                $errors = $this->view->page_error;
            }

            if (empty($_FILES['image'])) {
                $errors[] = get_lang('image_required');
            }

            if (empty($errors)) {
                $uploader = new Uploader();
                $upload_config = Getters::$default_upload_config;
                $upload_config['limit'] = 999;
                $upload_data = $uploader->upload($_FILES['image'], $upload_config);

                if ($upload_data['isComplete']) {
                    $filepaths = $upload_data['data']['metas'];
                }

                if ($upload_data['isSuccess']) {
                    if (!is_array($filepaths)) {
                        $filepaths = array($filepaths);
                    }

                    $file = $filepaths[0];

                    $modeldata['path'] = $file['name'];
                    $modeldata['original_name'] = $file['old_name'];

                    if (!$this->rec_id = $db->insert($this->tablename, $modeldata)) {
                        $errors[] = get_lang('error_inserting_record');
                    }
                } else {
                    if ($upload_data['hasErrors']) {
                        $upload_errors = $upload_data['errors'];
                        foreach ($upload_errors as $key => $val) {
                            //you can pass upload errors to the view
                            $errors[] = $val[0];
                        }
                    } else {
                        $errors[] = get_lang('additional_photos_upload_error');
                    }
                }
            }

            ajaxFormPostOutcome($errors, get_link("gallery"));
            return;
        }

        $this->view->page_title = get_lang('new_gallery');
        return $this->render_view("gallery/new.php");
    }

    function new_link($rec_id = null) {
        $db = $this->GetModel();

        if (is_post_request()) {
            $errors = [];
            $postdata = $this->format_request_data($_POST);
            
            if (empty($postdata['link'])) {
                $errors[] = get_lang('invalid_link');
            }
            
            if (empty($errors)) {
                //Insert or update main record
                if (empty($rec_id)) {
                    //Generate product reference
                    $rec_id = $this->rec_id = $db->insert($this->tablename, [
                        'type' => MediaType::video,
                        'path' => $postdata['link'],
                    ]);
                } else {
                    $db->where("id", $rec_id);
                    if (!$db->update($this->tablename, [
                        'path' => $postdata['link']
                    ])) {
                        $rec_id = null; //update failed
                    }
                }
                
                if (empty($rec_id)) {
                    $errors[] = get_lang('error_inserting_record');
                }
            }

            ajaxFormPostOutcome($errors, get_link("gallery"));
            return;
        }
    }

    /**
     * Delete record from the database
     * Support multi delete by separating record id by comma.
     * @return BaseView
     */
    function delete($rec_id = null) {
        Csrf::cross_check();
        $request = $this->request;
        $db = $this->GetModel();
        $this->rec_id = $rec_id;
        //form multiple delete, split record id separated by comma into array
        $arr_rec_id = array_map('trim', explode(",", $rec_id));
        $errors = [];
        $db->startTransaction();

        foreach ($arr_rec_id as $id) {
            $db->where("id", $id);
            $file = $db->get($this->tablename);

            if ($file) {
                unlink(UPLOAD_FILE_DIR . $file['path']);
                $db->where("id", $id);

                if (!$db->delete($this->tablename)) {
                    $errors[] = $db->getLastError();
                }
            }
        }

        if (empty($errors)) {
            $this->set_flash_msg(get_lang('record_deleted_successfully'), "success");
            $db->commit();
        } else {
            $page_error = 'Erros: <ul>';

            foreach ($errors as $error) {
                $page_error .= '<li>' . $error . '</li>';
            }

            $page_error .= '</ul>';

            $this->set_flash_msg($page_error, "danger");
            $db->rollback();
        }

        return $this->redirect((isset($request->redirect) ? $request->redirect : 'gallery'));
    }

}
