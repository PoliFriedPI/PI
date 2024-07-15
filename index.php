<?php
require_once 'config/config.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/PerfilController.php';
require_once 'controllers/SucursalController.php';
require_once 'controllers/ProductoController.php';

class DashboardController {
    public function index() {
        require_once './views/AdminDashboard.php';
    }
}

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($controller) {
    case 'login':
        $loginController = new LoginController();
        if ($action == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginController->login($email, $password);
        } elseif ($action == 'changePassword') {
            $newPassword = $_POST['new_password'];
            $loginController->changePassword($newPassword);
        } elseif ($action == 'cambiarContrasena') {
            $loginController->cambiarContrasena();
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
                $id = $_GET['id'];
                $perfilController->eliminar($id);
                break;
            default:
                $perfilController->listar();
                break;
        }
        break;
    case 'dashboard':
        $dashboardController = new DashboardController();
        if ($action == 'index') {
            $dashboardController->index();
        } elseif ($action == 'productos') {
            header("Location: index.php?controller=producto&action=listar");
        } elseif ($action == 'sucursales') {
            header("Location: index.php?controller=sucursal&action=listar");
        } else {
            header("Location: index.php?controller=dashboard&action=index");
        }
        break;
    case 'producto':
        $productoController = new ProductoController();
        switch ($action) {
            case 'listar':
                $productoController->listar();
                break;
            case 'agregar':
                $productoController->agregar();
                break;
            case 'guardar':
                $productoController->guardar();
                break;
            case 'editar':
                $id = isset($_GET['id']) ? $_GET['id'] : die('Error: ID no especificado.');
                $productoController->editar($id);
                break;
            case 'eliminar':
                $id = isset($_GET['id']) ? $_GET['id'] : die('Error: ID no especificado.');
                $productoController->eliminar($id);
                break;
            default:
                die('Acción no válida.');
                break;
        }
        break;
    case 'sucursal':
        $sucursalController = new SucursalController();
        switch ($action) {
            case 'listar':
                $sucursalController->listar();
                break;
            case 'crear':
                $sucursalController->crear();
                break;
            case 'guardar':
                $sucursalController->guardar($_POST);
                break;
            case 'editar':
                $id = $_GET['id'];
                $sucursalController->editar($id);
                break;
            case 'actualizar':
                $id = $_GET['id'];
                $sucursalController->actualizar($id, $_POST);
                break;
            case 'eliminar':
                $id = $_GET['id'];
                $sucursalController->eliminar($id);
                break;
            default:
                $sucursalController->listar();
                break;
        }
        break;
    default:
        header("Location: views/login.php");
        break;
}
?>
