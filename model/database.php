<?php
    $dsn = 'mysql:host=localhost;dbname=cinemaapp';// require database name, username, password
    $username = 'root';
    $password = 'root';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>