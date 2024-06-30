<?php
session_start();
include 'conexion.php'; // Incluir archivo de conexión

try {
    // Recuperar datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consulta para verificar el usuario y contraseña
    $consulta = "SELECT * FROM tbl_perfil WHERE per_email = :usuario AND per_password = :password";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $perfil = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($perfil) {
        if ($perfil['per_estado'] === 'N') {
            // Redirigir a la página de cambio de contraseña
            $_SESSION['usuario'] = $perfil;
            header("Location: cambiarPassword.php");
            exit();
        }

        // Obtener rol del usuario
        $rol_id = $perfil['rol_id'];
        $consulta_rol = "SELECT * FROM tbl_rol WHERE rol_id = :rol_id";
        $stmt_rol = $conexion->prepare($consulta_rol);
        $stmt_rol->bindParam(':rol_id', $rol_id);
        $stmt_rol->execute();
        $rol = $stmt_rol->fetch(PDO::FETCH_ASSOC);

        if ($rol) {
            $_SESSION['usuario'] = $perfil;

            // Redireccionar según el tipo de usuario
            if ($rol['rol_nombre'] === 'administrador') {
                header("Location: DashboardAdmin.php");
                exit();
            } elseif ($rol['rol_nombre'] === 'vendedor') {
                header("Location: DashboardVentas.php");
                exit();
            } else {
                echo "Rol no reconocido";
            }
        } else {
            echo "Rol no encontrado";
        }
    } else {
        echo "Usuario o contraseña incorrectos";
    }

} catch (PDOException $exc) {
    echo "Error al conectar a la base de datos: " . $exc->getMessage();
}
?>
