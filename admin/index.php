<?php
// admin/index.php
require_once('../model/database.php');
require_once('../model/vehicles_db.php');
require_once('../model/makes_db.php');
require_once('../model/types_db.php');
require_once('../model/classes_db.php');

$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
$sort = filter_input(INPUT_GET, 'sort') ?: 'price';

$action = filter_input(INPUT_POST, 'action') ?: filter_input(INPUT_GET, 'action') ?: 'list_vehicles';

if ($action == 'list_vehicles') {
    // Same filtering/sorting logic as public but includes a delete button
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    $vehicles = get_vehicles($make_id, $type_id, $class_id, $sort);
    include('../view/vehicle_list.php'); 

} elseif ($action == 'delete_vehicle') {
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    delete_vehicle($vehicle_id);
    header("Location: .?action=list_vehicles");

} elseif ($action == 'show_add_form') {
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include('view/add_vehicle.php');

} elseif ($action == 'add_vehicle') {
    // Collect and validate all POST data
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    // Ensure no fields are empty or invalid
    if ($make_id && $type_id && $class_id && $year && $model && $price) {
        add_vehicle($make_id, $type_id, $class_id, $year, $model, $price);
        // Redirect to the admin home to see the new vehicle
        header("Location: .?action=list_vehicles");
    } else {
        $error = "Invalid vehicle data. Check all fields and try again.";
        include('../view/error.php');
    }
}

// select all of the different controllers
if ($action == 'list_makes') {
    include('controllers/makes.php');
} elseif ($action == 'list_types') {
    include('controllers/types.php');
} elseif ($action == 'list_classes') {
    include('controllers/classes.php');
}
?>