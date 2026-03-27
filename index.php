<?php
// index.php (Root Controller)
require_once('model/database.php');
require_once('model/vehicles_db.php');
require_once('model/makes_db.php');
require_once('model/types_db.php');
require_once('model/classes_db.php');

// Get parameters for filtering and sorting
$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
$sort = filter_input(INPUT_GET, 'sort');

// Fetch data from Model
$makes = get_makes();
$types = get_types();
$classes = get_classes();
$vehicles = get_vehicles($make_id, $type_id, $class_id, $sort);

include('view/vehicle_list.php');
?>