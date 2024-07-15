<!-- views/agregar.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
<h2>Agregar Producto</h2>
<form action="index.php?controller=producto&action=agregar" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" required>
    <br>
    <label for="extra">Extra:</label>
    <input type="checkbox" name="extra">
    <br>
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen">
    <br>
    <input type="hidden" name="estado" value="A">
    <input type="submit" value="Agregar">
</form>
</body>
</html>
