<?php
// admin/controllers/classes.php
require_once('../model/database.php');
require_once('../model/classes_db.php');

$action = filter_input(INPUT_POST, 'action') ?: filter_input(INPUT_GET, 'action') ?: 'list_classes';

if ($action == 'list_classes') {
    $classes = get_classes();
    include('../view/class_list.php');

} elseif ($action == 'add_class') {
    $class_name = filter_input(INPUT_POST, 'class_name');
    if ($class_name) {
        add_class($class_name);
        header("Location: .?action=list_classes");
    } else {
        $error = "Invalid class name.";
        include('../view/error.php');
    }

} elseif ($action == 'delete_class') {
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    if ($class_id) {
        delete_class($class_id);
        header("Location: .?action=list_classes");
    } else {
        $error = "Missing or incorrect class ID.";
        include('../view/error.php');
    }
}
?>