<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}


require_once "conexion.php";


try {
    $query = "SELECT per_id, per_nombre, per_apellido, per_email, per_estado FROM tbl_perfil";
    $statement = $conexion->prepare($query);
    $statement->execute();
    $perfiles = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exc) {
    echo "Error al obtener perfiles: " . $exc->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Perfiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Listado de Perfiles</h1>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Estado Perfil</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($perfiles as $perfil): ?>
        <tr>
            <td><?php echo $perfil['per_id']; ?></td>
            <td><?php echo $perfil['per_nombre']; ?></td>
            <td><?php echo $perfil['per_apellido']; ?></td>
            <td><?php echo $perfil['per_email']; ?></td>
            <td><?php echo $perfil['per_estado']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<button onclick="abrirModal()">Registrar Nuevo Perfil</button>

<!-- Modal para registrar nuevo perfil -->
<div id="modal" style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 999; padding-top: 100px;">
    <div style="background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 80%;">
        <span onclick="cerrarModal()" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
        <h2>Registrar Nuevo Perfil</h2>

        <form method="post" action="guardarPerfil.php">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellido">Apellido:</label><br>
            <input type="text" id="apellido" name="apellido" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <label for="rol">Rol:</label><br>
            <select id="rol" name="rol" required>
                <?php
                // Consulta SQL para obtener los roles activos
                try {
                    $query_roles = "SELECT rol_id, rol_nombre FROM tbl_rol WHERE rol_estado = 'A'";
                    $statement_roles = $conexion->prepare($query_roles);
                    $statement_roles->execute();
                    $roles = $statement_roles->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($roles as $rol) {
                        echo "<option value='" . $rol['rol_id'] . "'>" . $rol['rol_nombre'] . "</option>";
                    }
                } catch (PDOException $exc) {
                    echo "Error al obtener roles: " . $exc->getMessage();
                }
                ?>
            </select><br><br>

            <input type="submit" value="Guardar">
        </form>

    </div>
</div>

<script>
    function abrirModal() {
        document.getElementById('modal').style.display = 'block';
    }

    function cerrarModal() {
        document.getElementById('modal').style.display = 'none';
    }
</script>
</body>
</html>
