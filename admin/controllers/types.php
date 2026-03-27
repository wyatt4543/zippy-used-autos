<?php
require_once('../model/database.php');
require_once('../model/types_db.php');

$action = filter_input(INPUT_POST, 'action') ?: filter_input(INPUT_GET, 'action') ?: 'list_types';

if ($action == 'list_types') {
    $types = get_types();
    include('../view/type_list.php');
} elseif ($action == 'add_type') {
    $type_name = filter_input(INPUT_POST, 'type_name');
    add_type($type_name);
    header("Location: .?action=list_types");
} elseif ($action == 'delete_type') {
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    delete_type($type_id);
    header("Location: .?action=list_types");
}