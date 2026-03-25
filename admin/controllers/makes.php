<?php
// admin/controllers/makes.php
require_once('../model/database.php');
require_once('../model/makes_db.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_makes';
    }
}

// Logic based on the action
if ($action == 'list_makes') {
    $makes = get_makes();
    include('../view/makes_list.php');

} else if ($action == 'add_make') {
    $make_name = filter_input(INPUT_POST, 'make_name');
    if ($make_name == NULL) {
        $error = "Invalid make name. Check all fields and try again.";
        include('../view/error.php');
    } else {
        add_make($make_name);
        header("Location: .?action=list_makes"); // Redirect to refresh list
    }

} else if ($action == 'delete_make') {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    if ($make_id == NULL || $make_id == FALSE) {
        $error = "Missing or incorrect make ID.";
        include('../view/error.php');
    } else {
        delete_make($make_id);
        header("Location: .?action=list_makes");
    }
}
?>