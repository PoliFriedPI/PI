<!DOCTYPE html>
<html>
<head>
    <title>Agregar Categoría</title>
</head>
<body>
<h1>Agregar Categoría</h1>
<form action="index.php?controller=categoria&action=agregar_categoria" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br>
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" id="imagen"><br>
    <input type="submit" value="Agregar">
</form>
</body>
</html>
