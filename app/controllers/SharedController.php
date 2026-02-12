<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * eproc_users_username_value_exist Model Action
     * @return array
     */
	function eproc_users_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("tbl_user");
		return $exist;
	}

	/**
     * eproc_users_user_email_value_exist Model Action
     * @return array
     */
	function eproc_users_user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("user_email", $val);
		$exist = $db->has("tbl_user");
		return $exist;
	}

	static function optionListToValueLabel($list) {
        $new_array = array();

        foreach ($list as $item) {
            $new_array[$item['value']] = $item['label'];
        }

        return $new_array;
    }

    public function getInput(
            $name,
            $input_type,
            $value = '',
            $css_class = '',
            $style = '',
            $other_attr = '',
            $source = null,
            $default = null,
            $num_decimal = 2,
            $add_value_to_string = false,
            $label = null
    ) {
        $echo_js = '';
        is_null($default) && $default = ' -- ' . get_lang('please_select') . ' --';

        if (!in_array($input_type, array(InputType::select, InputType::textarea))) {
            $echo = '<input type=';

            switch ($input_type) {
                case InputType::date:
                    $echo .= '"date"';
                    break;
                case InputType::text:
                    $echo .= '"text"';
                    break;
                case InputType::number:
                    $echo .= '"text"';
                    break;
                case InputType::password:
                    $echo .= '"password"';
                    break;
                case InputType::submit:
                    $echo .= '"submit"';
                    break;
                case InputType::hidden:
                    $echo .= '"hidden"';
                    break;
                case InputType::button:
                    $echo .= '"button"';
                    break;
                case InputType::checkbox:
                    $echo .= '"checkbox"';
                    break;
                case InputType::radio:
                    $echo .= '"radio"';
                case InputType::datetime:
                    $echo .= '"datetime-local"';
                    break;
            }

            $echo .= " name=\"$name\" id=\"$name\" ";

//            if (!in_array($input_type, array(InputType::date, InputType::datetime))) {
//                $echo .= (trim($value) != '' ? ' ng-init="' . $name . ' = \'' . $value . '\'"' : '');
//            } else {
//                $echo .= (trim($value) != '' ? ' ng-init="' . $name . ' = mysqlDateToJSDate(\'' . $value . '\')"' : '');
//            }

            $echo .= (trim($value) != '' ? ' value ="' . $value . '"' : '');
            $echo .= (trim($css_class) != '' ? ' class="' . $css_class . ($input_type == InputType::number ? " currency" : "") . '"' : '');
            $echo .= (trim($style) != '' ? ' style="' . $style . '"' : '');
            $echo .= (trim($other_attr) != '' ? ' ' . $other_attr : '');
            $echo .= ' />';
        } else {  //Create select (combobox) or textarea
            if ($input_type == InputType::select) {
                $echo = '<select';
                $echo .= " name=\"$name\" id=\"$name\" ";
                $echo .= ($value != '' ? ' value="' . $value . '"' : '');
//                $echo .= (trim($value) != '' ? ' ng-init="' . $name . ' = \'' . $value . '\'"' : '');
                $echo .= ($css_class != '' ? ' class="' . $css_class . '"' : '');
                $echo .= ($style != '' ? ' style="' . $style . '"' : '');
                $echo .= ($other_attr != '' ? ' ' . $other_attr : '');
                $echo .= '>';

                if (!is_null($default)) {
                    $echo .= '<option value="">';
                    $echo .= $default;
                    $echo .= '</option>';
                }

                if (!is_null($source)) {
                    foreach ($source as $option) {
                        $echo .= '<option value="' . (string) $option['value'] . '"' . ($option['value'] != $value ? '' : ' selected') . '>';
                        $echo .= (!empty($add_value_to_string) ? ($option['value'] . ' - ') : '') . $option['label'];
                        $echo .= '</option>';
                    }
                }

                $echo .= '</select>';
            } else {
                $echo = '<textarea';
                $echo .= " name=\"$name\" id=\"$name\" ng-model=\"$name\"";
                $echo .= ($css_class != '' ? ' class="' . $css_class . '"' : '');
                $echo .= (trim($value) != '' ? ' ng-init="' . $name . ' = \'' . $value . '\'"' : '');
                $echo .= ($style != '' ? ' style="' . $style . '"' : '');
                $echo .= ($other_attr != '' ? ' ' . $other_attr : '');
                $echo .= '>';
                $echo .= (trim($value) != '' ? $value : '');
                $echo .= '</textarea>';
            }
        }

        if (!empty($label)) {
            $return = '<div class="form-group">';
            $return .= '<label>';
            $return .= $label;
            $return .= '</label>';
            $return .= $echo;
            $return .= $echo_js;
            $return .= '</div>';
        } else {
            $return = $echo;
            $return .= $echo_js;
        }

        return $return;
    }

    function addInput(array $field) {
        echo '<div class="form-group">';
        echo '<label for="',
        $field['name'],
        '" class=" col-form-label">',
        $field['label'],
        (array_key_exists('required', $field) && $field['required'] ? ' <span class="text-danger">*</span>' : ''),
        '</label>';
        echo '<div class="">';

        $other_str = '';

        if (in_array($field['type'], array(InputType::text, InputType::password))) {
            $other_str .= ' placeholder="' . $field['label'] . '"';
        }

        if (array_key_exists('required', $field) && $field['required']) {
            $other_str .= ' required="required"';
        }

        if (array_key_exists('other', $field) && $field['other']) {
            $other_str .= $field['other'];
        }


        $css_class = 'form-control' . ($field['type'] == InputType::date ? ' datepicker' : '');

        if (array_key_exists('class', $field) && $field['class']) {
            $css_class .= ' ' . $field['class'];
        }

        if ($field['type'] != InputType::file) {
            echo $this->getInput(
                    $field['name'],
                    $field['type'],
                    (array_key_exists('value', $field) ? $field['value'] : ''),
                    $css_class,
                    '',
                    $other_str,
                    ($field['type'] == InputType::select && !empty($field['options']) ? $field['options'] : null),
                    (array_key_exists('default_label', $field) ? $field['default_label'] : '--select value--')
            );
        } else {
            echo $this->addFileInput($field['name']);
        }

        if (array_key_exists('help_text', $field) && $field['help_text']) {
            echo '<small id="emailHelp" class="form-text text-muted">';
            echo $field['help_text'];
            echo '</small>';
        }

        echo '</div>';
        echo '</div>';
    }

    function addFileInput($name) {
        echo '<a class="btn btn-primary" href="javascript:void(0)">
                Choose File...
                <input name="' . $name . '" type="file" style=\'z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;\' size="40"  onchange=\'$("#' . $name . '-info").html($(this).val());\'>
            </a>
            &nbsp;
            <span class="label label-info" id="' . $name . '-info"></span>';
    }

    static function AlertDiv($text, $type) {
        echo "<div class='alert alert-$type'>", $text, "</div>";
    }

    static function toNumber($value, $to_sql = false, $decimal = null, $zero_desc = '-') {
        $value = str_replace(
                array(',', ' '),
                '',
                self::trimSpace($value, '')
        );
        if ($to_sql) {
            return $value;
        }
        if (trim((string) $value) == '') {
            return '';
        }
        is_null($decimal) && $decimal = 2;
        $value = round($value, $decimal);
        $values = explode('.', $value);
        $value = to_currency($values[0]);
        if ($value == '0' && substr($values[0], 0, 1) == '-') {
            $value = '-' . $value;
        }
        if ($decimal != 0) {
            $value .= '.';
        }
        if (count($values) == 2) {
            $value .= str_pad($values[1], $decimal, '0', STR_PAD_RIGHT);
        } else {
            $value .= str_pad('', $decimal, '0', STR_PAD_RIGHT);
        }
        $value == '0.' . str_pad('', $decimal, '0', STR_PAD_RIGHT) && $value = $zero_desc;
        return $value;
    }

    static function trimSpace($value, $replace = ' ') {
        return trim(preg_replace(
                        '/\s{3,}/',
                        $replace,
                        $value
        ));
    }

    static function htmlDateToMysql($date_str) {
        if (!empty($date_str)) {
            $date = DateTime::createFromFormat('D M d Y H:i:s e+', $date_str);

            if ($date) {
                return $date->format("Y-m-d");
            }
        }

        return null;
    }

    static function hideField($field, $filtered_columns) {
        return (array_key_exists('hide', $field) && $field['hide']) || (!empty($filtered_columns) && !in_array($field['field'], $filtered_columns));
    }

    function get_field_options($options_enum) {
        $db = $this->GetModel();
        $sqltext = "SELECT  value, name AS label FROM eproc_field_options where enum_id = " . $options_enum;
        $arr = $db->rawQuery($sqltext);
        return $arr;
    }

    function get_field_options_value_name($options_enum) {
        $db = $this->GetModel();
        $sqltext = "SELECT  value, name AS label FROM eproc_field_options where enum_id = " . $options_enum;
        $arr = $db->rawQuery($sqltext);

        $return = array();
        foreach ($arr as $r) {
            $return[$r['value']] = $r['label'];
        }

        return $return;
    }

    static function parse($text) {
        // Damn pesky carriage returns...
        $text = str_replace("\r\n", "\n", $text);
        $text = str_replace("\r", "\n", $text);

        // JSON requires new line characters be escaped
        $text = str_replace("\n", "\\n", $text);
        return $text;
    }

    static function getDescPreview($string, $num_letters = 500) {
        return (strlen($string) > $num_letters ? substr($string, 0, $num_letters) . '...' : $string);
    }

	/**
     * 
     * @param array $specs ['table' => 'table name', 'value_column' => 'value column' , 'label_column' => 'label column']
     * @return type
     */
    function get_field_options_from_table(array $specs) {
        $db = $this->GetModel();
        $sqltext = "SELECT  {$specs['value_column']} as value, {$specs['label_column']} AS label FROM {$specs['table']} ORDER BY {$specs['label_column']} ASC";
        $arr = $db->rawQuery($sqltext);
        return $arr;
    }
}
