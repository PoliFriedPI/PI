<!DOCTYPE html>
<html>
<head>
    <title>Lista de Combos</title>
</head>
<body>
<h1>Lista de Combos</h1>
<a href="index.php?controller=combo&action=agregar_combo">Agregar Combo</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Categoría</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($combos as $combo): ?>
        <tr>
            <td><?php echo $combo['com_id']; ?></td>
            <td><?php echo $combo['com_nombre']; ?></td>
            <td><?php echo $combo['com_descripcion']; ?></td>
            <td><img src="<?php echo $combo['com_imagen']; ?>" width="50" height="50"></td>
            <td><?php echo $combo['com_precio']; ?></td>
            <td><?php echo $combo['cat_nombre']; ?></td>
            <td><?php echo $combo['com_estado']; ?></td>
            <td>

                <a href="index.php?controller=combo&action=editar_combo&id=<?php echo $combo['com_id']; ?>">Editar</a>
                <a href="index.php?controller=combo&action=eliminarLogico_combo&id=<?php echo $combo['com_id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
