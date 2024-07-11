<?php
require_once 'controllers/LoginController.php';

if (isset($_GET['action']) && $_GET['action'] == 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginController = new LoginController();
    $loginController->login($email, $password);
} else {
    header("Location: views/login.php");
}
?>
