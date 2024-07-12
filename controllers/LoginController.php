<?php
require_once './config/config.php';
require_once './models/perfil.php';

class LoginController {
    private $db;

    public function __construct() {
        global $conexion;
        $this->db = $conexion;
    }

    public function login($email, $password) {
        session_start();

        // Verificar si el usuario está bloqueado
        if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
            header("Location: ./views/login.php?error=La cuenta está bloqueada. Inténtelo de nuevo en 15 segundos.");
            exit();
        }

        $stmt = $this->db->prepare("SELECT * FROM tbl_perfil perfil WHERE per_email = :email AND per_password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user_id'] = $user['per_id'];
            $_SESSION['user_name'] = $user['per_nombre'];
            unset($_SESSION['login_attempts']);
            unset($_SESSION['lockout_time']);
            header("Location: ./views/admindashboard.php");
        } else {
            if (!isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts'] = 0;
            }
            $_SESSION['login_attempts']++;

            if ($_SESSION['login_attempts'] >= 3) {
                $_SESSION['lockout_time'] = time() + 15; // 15 segundos de bloqueo
                header("Location: ./views/login.php?error=La cuenta está bloqueada. Inténtelo de nuevo en 15 segundos.");
            } else {
                header("Location: ./views/login.php?error=Credenciales incorrectas. Intento " . $_SESSION['login_attempts'] . " de 3.");
            }
        }
    }
}
?>
