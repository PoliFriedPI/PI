<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol_id = $_POST['rol'];
    $estado_perfil = 'N'; // Estado inicial 'N' para un nuevo perfil

    try {
        $query = "INSERT INTO tbl_perfil (per_nombre, per_apellido, per_email, per_password, per_estado, rol_id) 
                  VALUES (:nombre, :apellido, :email, :password, :estado, :rol)";

        $statement = $conexion->prepare($query);

        // Bind de parámetros
        $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $statement->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':estado', $estado_perfil, PDO::PARAM_STR);
        $statement->bindParam(':rol', $rol_id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $statement->execute();

        // Redirigir a la página de listado de perfiles después de guardar
        header("Location: DashboardAdmin.php");
        exit();

    } catch (PDOException $exc) {
        echo "Error al guardar perfil: " . $exc->getMessage();
        exit();
    }
} else {
    // Si no se recibieron datos por POST, redirigir a la página de listado de perfiles
    header("Location: DashboardAdmin.php");
    exit();
}
?>
