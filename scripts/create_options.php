<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../config.php');
require_once '../helpers/Functions.php';
require_once '../helpers/Constants.php';
require_once '../app/models/PDODb.php';

$db = new PDODb(DB_TYPE, DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT, DB_CHARSET);

$array = array();
//status
$array[] = array(
    'enum_id' => FieldOptions::status,
    'value' => Status::active,
    'name' => 'Active',
);

$array[] = array(
    'enum_id' => FieldOptions::status,
    'value' => Status::closed,
    'name' => 'Closed',
);

$array[] = array(
    'enum_id' => FieldOptions::status,
    'value' => Status::published,
    'name' => 'Published',
);

$array[] = array(
    'enum_id' => FieldOptions::yes_no,
    'value' => YesNo::yes,
    'name' => 'Yes',
);

$array[] = array(
    'enum_id' => FieldOptions::yes_no,
    'value' => YesNo::no,
    'name' => 'No',
);

foreach ($array as $array_item) {
    $query = "select id
        from eproc_field_options
        where enum_id = " . $array_item['enum_id'] . "
        and value = " . $array_item['value'];
    $row = $db->rawQueryOne($query);

    if ($row) {
        $values = array(
            'name' => $array_item['name']
        );

        $db->where("id", $row['id']);
        $db->update('eproc_field_options', $values);
    } else {
        $values = array(
            'enum_id' => $array_item['enum_id'],
            'value' => $array_item['value'],
            'name' => $array_item['name']
        );

        $db->insert("eproc_field_options", $values);
    }
}