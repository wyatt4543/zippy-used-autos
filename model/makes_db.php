<?php
// model/makes_db.php

// Get all makes sorted alphabetically
function get_makes() {
    global $db;
    $query = 'SELECT * FROM makes ORDER BY make_name';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

// Get a specific make name by ID (useful for headers)
function get_make_name($make_id) {
    global $db;
    $query = 'SELECT * FROM makes WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    return $make['make_name'];
}

// Add a new make to the database
function add_make($make_name) {
    global $db;
    $query = 'INSERT INTO makes (make_name) VALUES (:make_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_name', $make_name);
    $statement->execute();
    $statement->closeCursor();
}

// Delete a make from the database
function delete_make($make_id) {
    global $db;
    $query = 'DELETE FROM makes WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}
?>