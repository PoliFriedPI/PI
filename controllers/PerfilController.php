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
        $stmt = $this->db->prepare("SELECT * FROM tbl_perfil WHERE per_estado = 1");
        $stmt->execute();
        $perfiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once './views/Perfil/ListarPerfil.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rol_id = $_POST['rol_id'];

            $stmt = $this->db->prepare("INSERT INTO tbl_perfil (per_nombre, per_apellido, per_email, per_password, per_estado, rol_id) VALUES (:nombre, :apellido, :email, :password, 1, :rol_id)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':rol_id', $rol_id);
            $stmt->execute();

            header("Location: index.php?controller=perfil&action=listar");
        } else {
            require_once './views/Perfil/CrearPerfil.php';
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

    public function eliminar() {
        $id = $_GET['id'];
        $stmt = $this->db->prepare("UPDATE tbl_perfil SET per_estado = 0 WHERE per_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: index.php?controller=perfil&action=listar");
    }
}
?>
