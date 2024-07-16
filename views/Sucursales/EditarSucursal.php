<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sucursal</title>
</head>
<body>
<h1>Editar Sucursal</h1>
<form action="index.php?controller=sucursal&action=editar&id=<?php echo $sucursal['suc_id']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $sucursal['nombre']; ?>" required><br><br>

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $sucursal['direccion']; ?>" required><br><br>

    <label for="prod_id">Producto:</label>
    <select name="prod_id" id="prod_id">
        <option value="<?php echo $producto['prod_id']; ?>"><?php echo $prod_nombre; ?></option>
        <!-- Aquí podrías incluir lógica para mostrar otros productos -->
    </select><br><br>

    <label for="suc_stock">Stock:</label>
    <input type="number" id="suc_stock" name="suc_stock" value="<?php echo $sucursal['suc_stock']; ?>" required><br><br>

    <!-- Otros campos de la sucursal -->

    <button type="submit">Guardar Cambios</button>
</form>
</body>
</html>
