<?php
// model/vehicles_db.php

function get_vehicles($make_id, $type_id, $class_id, $sort) {
    global $db;
    $query = 'SELECT V.vehicle_id, V.year, V.model, V.price, M.make_name, T.type_name, C.class_name 
              FROM vehicles V
              LEFT JOIN makes M ON V.make_id = M.make_id
              LEFT JOIN types T ON V.type_id = T.type_id
              LEFT JOIN classes C ON V.class_id = C.class_id';
    
    // Filtering Logic
    if ($make_id) {
        $query .= ' WHERE V.make_id = :make_id';
    } elseif ($type_id) {
        $query .= ' WHERE V.type_id = :type_id';
    } elseif ($class_id) {
        $query .= ' WHERE V.class_id = :class_id';
    }

    // Sorting Logic
    if ($sort == 'year') {
        $query .= ' ORDER BY V.year DESC';
    } else {
        $query .= ' ORDER BY V.price DESC';
    }

    $statement = $db->prepare($query);
    if ($make_id) { $statement->bindValue(':make_id', $make_id); }
    if ($type_id) { $statement->bindValue(':type_id', $type_id); }
    if ($class_id) { $statement->bindValue(':class_id', $class_id); }
    
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($make_id, $type_id, $class_id, $year, $model, $price) {
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, make_id, type_id, class_id)
              VALUES (:year, :model, :price, :make_id, :type_id, :class_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}