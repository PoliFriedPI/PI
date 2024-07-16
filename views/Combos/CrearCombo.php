<!DOCTYPE html>
<html>
<head>
    <title>Agregar Combo</title>
</head>
<body>
<h1>Agregar Combo</h1>
<form action="index.php?controller=combo&action=agregar_combo" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion"></textarea><br>
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" id="imagen"><br>
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" step="0.01" required><br>
    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria" required>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?php echo $categoria['cat_id']; ?>"><?php echo $categoria['cat_nombre']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" value="Agregar">
</form>
</body>
</html>

