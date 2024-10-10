<?php

// include 'db.php';
// include 'task.php';

// $data = json_decode(file_get_contents('php://input'), true);

// $task = new Task($data['title'], $data['description'], $data['priority']);
// $db = connect_db();
// $task->save($db);

// echo json_encode($task);
?>
<?php
header('Content-Type: application/json');
include 'db.php'; // Your database connection

try {
    $db = connect_db();
    $data = json_decode(file_get_contents('php://input'), true);

    $title = $data['title'];
    $description = $data['description'];
    $priority = $data['priority'];

    // Insert into the database
    $stmt = $db->prepare("INSERT INTO tasks (title, description, priority) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $priority]);

    // Fetch the last inserted task
    $newTaskId = $db->lastInsertId();
    $stmt = $db->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$newTaskId]);
    $newTask = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($newTask); // Return the newly added task
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
