<?php
require_once 'config/config.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/PerfilController.php';
require_once 'controllers/ProductoController.php';
require_once 'controllers/ComboController.php'; // Añadimos ComboController
require_once 'controllers/CategoriaController.php'; // Añadimos CategoriaController
require_once 'controllers/SucursalController.php'; // Añadimos SucursalController

class DashboardController {
    public function index() {
        require_once './views/AdminDashboard.php';
    }
}

// Iniciar sesión
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($controller) {
    case 'login':
        $loginController = new LoginController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginController->login($email, $password);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $action == 'changePassword') {
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
    case 'sucursal': // Añadimos el caso para el SucursalController
        $sucursalController = new SucursalController();
        switch ($action) {
            case 'listar':
                $sucursalController->listar();
                break;
            case 'agregar':
                $sucursalController->agregar();
                break;
            case 'guardar':
                $sucursalController->guardar();
                break;
            case 'editar':
                $id = isset($_GET['id']) ? $_GET['id'] : die('Error: ID no especificado.');
                $sucursalController->editar($id);
                break;
            case 'eliminar':
                $id = isset($_GET['id']) ? $_GET['id'] : die('Error: ID no especificado.');
                $sucursalController->eliminar($id);
                break;
            default:
                die('Acción no válida.');
                break;
        }
        break;
    case 'combo': // Añadimos el caso para el ComboController
        $comboController = new ComboController();
        switch ($action) {
            case 'listar_combos':
                $comboController->listar_combos();
                break;
            case 'agregar_combo':
                $comboController->agregar_combo();
                break;
            case 'editar_combo':
                if ($id) {
                    $comboController->editar_combo($id);
                } else {
                    header('Location:index.php?controller=combo&action=listar_combos');
                }
                break;
            case 'eliminarLogico_combo':
                if ($id) {
                    $comboController->eliminarLogico_combo($id);
                } else {
                    header('Location:index.php?controller=combo&action=listar_combos');
                }
                break;
            default:
                header('Location: index.php?controller=combo&action=listar_combos');
                break;
        }
        break;
    case 'categoria':
        $categoriaController = new CategoriaController();
        switch ($action) {
            case 'listar_categorias':
                $categoriaController->listar_categorias();
                break;
            case 'agregar_categoria':
                $categoriaController->agregar_categoria();
                break;
            case 'editar_categoria':
                if ($id) {
                    $categoriaController->editar_categoria($id);
                } else {
                    header('Location: index.php?controller=categoria&action=listar_categorias');
                }
                break;
            case 'eliminarLogico_categoria':
                if ($id) {
                    $categoriaController->eliminarLogico_categoria($id);
                } else {
                    header('Location: index.php?controller=categoria&action=listar_categorias');
                }
                break;
            default:
                header('Location: index.php?controller=categoria&action=listar_categorias');
                break;
        }
        break;
    default:
        header("Location: views/login.php");
        break;
}
?>
