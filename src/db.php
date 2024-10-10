<?php

function connect_db() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'task-manager';

    // Create a DSN for PDO
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8";
    
    try {
        // Create a PDO instance (connect to the database)
        $pdo = new PDO($dsn, $username, $password);
        // Set error mode to exception for better error handling
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo; // Return the PDO connection object
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

