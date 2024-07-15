<!-- EditarSucursal.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sucursal</title>
    <style>
        /* Estilos CSS aquí */
    </style>
</head>
<body>
<h1>Editar Sucursal</h1>
<form action="index.php?controller=sucursal&action=actualizar&id=<?php echo $sucursal['suc_id']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $sucursal['nombre']; ?>" required><br><br>
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $sucursal['direccion']; ?>" required><br><br>
    <label for="status">Status:</label>
    <input type="text" id="status" name="status" value="<?php echo $sucursal['suc_status']; ?>" required><br><br>
    <label for="stock">Stock:</label>
    <input type="number" id="stock" name="stock" value="<?php echo $sucursal['suc_stock']; ?>" required><br><br>
    <button type="submit">Actualizar Sucursal</button>
</form>
</body>
</html>
