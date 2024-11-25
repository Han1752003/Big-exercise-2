<?php
require_once __DIR__ . '/../../config/database.php';

class Task {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllTasks($user_id) {
        $query = "SELECT * FROM tasks WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($user_id, $title, $content, $priority) {
        $query = "INSERT INTO tasks (user_id, title, content, priority) VALUES (:user_id, :title, :content, :priority)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':priority', $priority);
        $stmt->execute();
    }

    public function updateTask($task_id, $title, $content, $priority, $completed) {
        $query = "UPDATE tasks SET title = :title, content = :content, priority = :priority, completed = :completed WHERE id = :task_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':completed', $completed, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteTask($task_id) {
        $query = "DELETE FROM tasks WHERE id = :task_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->execute();
    }
}
?>
