<?php
require_once './config/config.php';
require_once './models/Perfil.php';

class PerfilController {
    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM tbl_perfil WHERE per_estado != 'I'");
        $perfiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once './views/Perfil/ListarPerfil.php';
    }


    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $estado = 'N'; // Estado inicial 'N' de nuevo

            // Crear un nuevo perfil
            $perfil = new Perfil(null, $nombre, '', $email, $password, $estado, null);
            $perfil->crearPerfil($nombre, $email, $password, $estado);

            // Verificar el estado del perfil creado
            if ($estado == 'N') {
                // Redirigir al usuario a la página de cambio de contraseña
                header("Location: index.php?controller=login&action=cambiarContrasena");
                exit();
            } else {
                // Redirigir al dashboard u otra página según tu aplicación
                header("Location: index.php?controller=dashboard&action=index");
                exit();
            }
        } else {
            include 'views/Perfil/CrearPerfil.php';
        }
    }



    public function editar() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rol_id = $_POST['rol_id'];

            $stmt = $this->db->prepare("UPDATE tbl_perfil SET per_nombre = :nombre, per_apellido = :apellido, per_email = :email, per_password = :password, rol_id = :rol_id WHERE per_id = :id");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':rol_id', $rol_id);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            header("Location: index.php?controller=perfil&action=listar");
        } else {
            $stmt = $this->db->prepare("SELECT * FROM tbl_perfil WHERE per_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $perfil = $stmt->fetch(PDO::FETCH_ASSOC);
            require_once './views/Perfil/EditarPerfil.php';
        }
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("UPDATE tbl_perfil SET per_estado = 'I' WHERE per_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: index.php?controller=perfil&action=listar");
    }
}
?>

