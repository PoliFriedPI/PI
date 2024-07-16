<!-- views/Sucursales/CrearSucursal.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Sucursal</title>
</head>
<body>
<h1>Crear Sucursal</h1>
<form action="index.php?controller=sucursal&action=agregar" method="POST">
    <!-- Campos de la sucursal -->
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br><br>
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" id="direccion" required>
    <br><br>
    <label for="prod_id">Producto:</label>
    <select name="prod_id" id="prod_id" required>
        <?php foreach ($productos as $producto): ?>
            <option value="<?php echo $producto['prod_id']; ?>">
                <?php echo $producto['prod_nombre']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <label for="suc_stock">Stock:</label>
    <input type="number" name="suc_stock" id="suc_stock" required>
    <br><br>

    <!-- Añadir campos ocultos para prod_image, prod_extra y prod_precio -->
    <input type="hidden" name="prod_image" value="">
    <input type="hidden" name="prod_extra" value="">
    <input type="hidden" name="prod_precio" value="">

    <br><br>
    <input type="submit" value="Guardar">
</form>
</body>
</html>
