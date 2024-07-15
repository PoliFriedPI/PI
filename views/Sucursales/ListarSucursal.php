<!-- ListarSucursales.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Sucursales</title>
    <style>
        /* Estilos CSS aquí */
    </style>
</head>
<body>
<h1>Listado de Sucursales</h1>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Status</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <!-- Aquí se debe iterar sobre cada sucursal para mostrarla en la tabla -->
    <?php foreach ($sucursales as $sucursal): ?>
        <tr>
            <td><?php echo $sucursal['suc_id']; ?></td>
            <td><?php echo $sucursal['nombre']; ?></td>
            <td><?php echo $sucursal['direccion']; ?></td>
            <td><?php echo $sucursal['suc_status']; ?></td>
            <td><?php echo $sucursal['suc_stock']; ?></td>
            <td>
                <a href="index.php?controller=sucursal&action=editar&id=<?php echo $sucursal['suc_id']; ?>">Editar</a>
                <a href="index.php?controller=sucursal&action=eliminar&id=<?php echo $sucursal['suc_id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="index.php?controller=sucursal&action=crear">Crear Nueva Sucursal</a>
</body>
</html>
