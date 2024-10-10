<?php

// include 'db.php';  // Database connection

// $db = connect_db();  // Get database connection

// $query = "SELECT * FROM tasks";  // SQL query to fetch tasks
// $tasks = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);  // Fetch tasks as associative array

// echo json_encode($tasks);  // Return tasks in JSON format
?>
<?php
header('Content-Type: application/json');
include 'db.php';  // Your database connection code

try {
    $db = connect_db();
    $query = "SELECT * FROM tasks";
    $tasks = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($tasks);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
