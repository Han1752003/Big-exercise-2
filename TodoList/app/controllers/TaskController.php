<?php
require_once __DIR__ . '/../models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function getTasks($user_id) {
        return $this->taskModel->getAllTasks($user_id);
    }

    public function addTask($user_id, $title, $content, $priority) {
        $this->taskModel->addTask($user_id, $title, $content, $priority);
    }

    public function updateTask($task_id, $title, $content, $priority, $completed) {
        $this->taskModel->updateTask($task_id, $title, $content, $priority, $completed);
    }

    public function deleteTask($task_id) {
        $this->taskModel->deleteTask($task_id);
    }
}
?>
