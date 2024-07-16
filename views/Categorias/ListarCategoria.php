<!DOCTYPE html>
<html>
<head>
    <title>Lista de Categorías</title>
</head>
<body>
<h1>Lista de Categorías</h1>
<a href="index.php?controller=categoria&action=agregar_categoria">Agregar Categoría</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($categorias as $categoria): ?>
        <tr>
            <td><?php echo $categoria['cat_id']; ?></td>
            <td><?php echo $categoria['cat_nombre']; ?></td>
            <td><img src="<?php echo $categoria['cat_image']; ?>" width="50" height="50"></td>
            <td><?php echo $categoria['cat_estado']; ?></td>
            <td>
                <a href="index.php?controller=categoria&action=editar_categoria&id=<?php echo $categoria['cat_id']; ?>">Editar</a>
                <a href="index.php?controller=categoria&action=eliminarLogico_categoria&id=<?php echo $categoria['cat_id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
