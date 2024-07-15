<!-- CrearSucursal.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Sucursal</title>
    <style>
        /* Estilos CSS aquí */
    </style>
</head>
<body>
<h1>Crear Nueva Sucursal</h1>
<form action="index.php?controller=sucursal&action=guardar" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required><br><br>
    <label for="status">Status:</label>
    <input type="text" id="status" name="status" required><br><br>
    <label for="stock">Stock:</label>
    <input type="number" id="stock" name="stock" required><br><br>
    <button type="submit">Guardar Sucursal</button>
</form>
</body>
</html>
