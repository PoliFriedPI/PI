<?php
require_once './config/config.php';
require_once './models/Perfil.php';

class LoginController {
    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function cambiarContrasena() {
        include 'views/change_password.php';
    }

    public function login($email, $password) {
        // Comprobar si el usuario es el maestro
        if ($email === 'admin@admin.com' && $password === '1234') {
            session_start();
            $_SESSION['user_id'] = 'master';
            $_SESSION['user_name'] = 'Master Admin';
            header("Location: index.php?controller=dashboard&action=index");
            exit();
        }

        // Verificar las credenciales en la base de datos
        $stmt = $this->db->prepare("SELECT * FROM tbl_perfil WHERE per_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['per_password'])) {
            session_start();
            $_SESSION['user_id'] = $user['per_id'];
            $_SESSION['user_name'] = $user['per_nombre'];

            if ($user['per_estado'] == 'N') {
                header("Location: index.php?controller=login&action=cambiarContrasena");
                exit();
            } else {
                header("Location: index.php?controller=dashboard&action=index");
                exit();
            }
        } else {
            $_SESSION['error'] = "Credenciales incorrectas.";
            header("Location: ./views/login.php");
            exit();
        }
    }

    public function changePassword() {
        session_start();
        $userId = $_SESSION['user_id'];
        $newPassword = $_POST['new_password'];
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("UPDATE tbl_perfil SET per_password = :password, per_estado = 'A' WHERE per_id = :id");
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        // Redireccionar al Dashboard
        header("Location: index.php?controller=dashboard&action=index");
        exit();
    }
}

?>
