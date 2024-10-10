<?php

class Task {
    public $id;
    public $title;
    public $description;
    public $priority;
    public $created_at;

    public function __construct($title, $description, $priority) {
        $this->title = $title;
        $this->description = $description;
        $this->priority = $priority;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function save($db) {
        $query = "INSERT INTO tasks (title, description, priority, created_at) VALUES (:title, :description, :priority, :created_at)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':priority', $this->priority);
        $stmt->bindParam(':created_at', $this->created_at);
        return $stmt->execute();
    }
}
