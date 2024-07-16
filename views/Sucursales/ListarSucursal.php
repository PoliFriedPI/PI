<!-- Aquí va la tabla con la lista de sucursales -->
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Producto</th>
        <th>Stock</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sucursales as $sucursal): ?>
    <tr>
        <td><?php echo $sucursal['suc_id']; ?></td>
        <td><?php echo $sucursal['nombre']; ?></td>
        <td><?php echo $sucursal['direccion']; ?></td>
        <td><?php echo $sucursal['prod_nombre']; ?></td>
        <td><?php echo $sucursal['suc_stock']; ?></td>
        <td><?php echo ($sucursal['suc_estado'] == 'A') ? 'Activo' : 'Inactivo'; ?></td>
        <td>
            <a href="index.php?controller=sucursal&action=editar&id=<?php echo $sucursal['suc_id']; ?>">Editar</a>
            <a href="index.php?controller=sucursal&action=eliminar&id=<?php echo $sucursal['suc_id']; ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="index.php?controller=sucursal&action=agregar">Agregar Sucursal</a>
