<?php
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root'; // Default for XAMPP
    $password = '';     // Default for XAMPP

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "Database Error: " . $error_message;
        exit();
    }
?>