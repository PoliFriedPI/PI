<?php
require_once './config/config.php';
require_once './models/Perfil.php';

class LoginController {
    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM tbl_perfil perfil WHERE per_email = :email AND per_password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['per_id'];
            $_SESSION['user_name'] = $user['per_nombre'];
            header("Location: index.php?controller=perfil&action=listar");
        } else {
            header("Location: ./views/login.php");
        }
    }
}
?>
