<?php
require_once 'config/config.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/PerfilController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($controller) {
    case 'login':
        $loginController = new LoginController();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginController->login($email, $password);
        } else {
            header("Location: views/login.php");
        }
        break;
    case 'perfil':
        $perfilController = new PerfilController();
        switch ($action) {
            case 'listar':
                $perfilController->listar();
                break;
            case 'crear':
                $perfilController->crear();
                break;
            case 'editar':
                $perfilController->editar();
                break;
            case 'eliminar':
                $perfilController->eliminar();
                break;
            default:
                $perfilController->listar();
                break;
        }
        break;
    default:
        header("Location: views/login.php");
        break;
}
?>
