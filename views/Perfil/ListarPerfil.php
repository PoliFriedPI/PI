<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Perfiles</title>
</head>
<body>
<h1>Listar Perfiles</h1>
<a href="index.php?controller=perfil&action=crear">Crear Perfil</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($perfiles as $perfil): ?>
        <tr>
            <td><?php echo $perfil['per_id']; ?></td>
            <td><?php echo $perfil['per_nombre']; ?></td>
            <td><?php echo $perfil['per_apellido']; ?></td>
            <td><?php echo $perfil['per_email']; ?></td>
            <td>
                <a href="index.php?controller=perfil&action=editar&id=<?php echo $perfil['per_id']; ?>">Editar</a>
                <a href="index.php?controller=perfil&action=eliminar&id=<?php echo $perfil['per_id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
