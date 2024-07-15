<!-- views/listar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
</head>
<body>
<h2>Listado de Productos</h2>
<a href="index.php?controller=producto&action=agregar">Agregar Producto</a>
<br><br>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Extra</th>
        <th>Imagen</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['prod_id']; ?></td>
            <td><?php echo $producto['prod_nombre']; ?></td>
            <td><?php echo $producto['prod_precio']; ?></td>
            <td><?php echo $producto['prod_extra'] ? 'Sí' : 'No'; ?></td>
            <td>
                <?php if ($producto['prod_image']): ?>
                    <img src="<?php echo $producto['prod_image']; ?>" alt="Imagen del producto">
                <?php else: ?>
                    Sin imagen
                <?php endif; ?>
            </td>
            <td>
                <?php
                switch ($producto['prod_estado']) {
                    case 'A':
                        echo 'Activo';
                        break;
                    case 'I':
                        echo 'Inactivo';
                        break;
                    case 'E':
                        echo 'Extra';
                        break;
                    default:
                        echo 'Desconocido';
                        break;
                }
                ?>
            </td>
            <td>
                <a href="index.php?controller=producto&action=editar&id=<?php echo $producto['prod_id']; ?>">Editar</a> |
                <a href="index.php?controller=producto&action=eliminar&id=<?php echo $producto['prod_id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
