<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nueva_password = $_POST['nueva_password'];
    $confirmar_password = $_POST['confirmar_password'];

    if ($nueva_password === $confirmar_password) {
        try {
            $usuario_id = $_SESSION['usuario']['per_id'];

            $query = "UPDATE tbl_perfil SET per_password = :nueva_password, per_estado = 'A' WHERE per_id = :usuario_id";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':nueva_password', $nueva_password, PDO::PARAM_STR);
            $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
            $stmt->execute();

            header("Location: DashboardAdmin.php");
            exit();

        } catch (PDOException $exc) {
            echo "Error al cambiar la contraseña: " . $exc->getMessage();
        }
    } else {
        $error = "Las contraseñas no coinciden.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
</head>
<body>
<h2>Cambiar Contraseña</h2>
<form method="post" action="cambiarPassword.php">
    <label for="nueva_password">Nueva Contraseña:</label><br>
    <input type="password" id="nueva_password" name="nueva_password" required><br><br>

    <label for="confirmar_password">Confirmar Contraseña:</label><br>
    <input type="password" id="confirmar_password" name="confirmar_password" required><br><br>

    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <input type="submit" value="Cambiar Contraseña">
</form>
</body>
</html>
