<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Định nghĩa đường dẫn tuyệt đối
define('BASE_PATH', dirname(__DIR__));

// Gọi các file controller và model
require_once BASE_PATH . '.../app/controllers/AuthController.php';
require_once BASE_PATH . '.../app/controllers/TaskController.php';

$authController = new AuthController();
$taskController = new TaskController();

// Lấy URL hiện tại
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Điều hướng theo URL
switch ($requestUri) {
    case '/auth/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->register($_POST['username'], $_POST['password']);
            header('Location: /auth/login');
        } else {
            require_once BASE_PATH . '/app/views/auth/register.php';
        }
        break;

    case '/auth/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $authController->login($_POST['username'], $_POST['password']);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /tasks');
            } else {
                echo "Thông tin đăng nhập không đúng!";
            }
        } else {
            require_once BASE_PATH . '/app/views/auth/login.php';
        }
        break;

    case '/tasks':
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
        }
        $tasks = $taskController->getTasks($_SESSION['user_id']);
        require_once BASE_PATH . '/app/views/tasks/index.php';
        break;

    // Các case khác...

    default:
        header('HTTP/1.0 404 Not Found');
        echo "404 Not Found";
        break;
}
