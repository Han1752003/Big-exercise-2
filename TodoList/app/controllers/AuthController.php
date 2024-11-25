<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register($username, $password) {
        $this->userModel->register($username, $password);
    }

    public function login($username, $password) {
        return $this->userModel->login($username, $password);
    }
}
?>
