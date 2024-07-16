<!DOCTYPE html>
<html>
<head>
    <title>Editar Categoría</title>
</head>
<body>
<h1>Editar Categoría</h1>
<form action="index.php?controller=categoria&action=editar_categoria&id=<?php echo $categoria['cat_id']; ?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $categoria['cat_nombre']; ?>" required><br>

    <label for="imagen_actual">Imagen Actual:</label><br>
    <img src="<?php echo $categoria['cat_image']; ?>" width="100" height="100"><br>

    <label for="imagen">Nueva Imagen (si desea cambiarla):</label>
    <input type="file" name="imagen" id="imagen"><br>

    <label for="estado">Estado:</label>
    <select name="estado" id="estado">
        <option value="A" <?php echo $categoria['cat_estado'] == 'A' ? 'selected' : ''; ?>>Activo</option>
        <option value="I" <?php echo $categoria['cat_estado'] == 'I' ? 'selected' : ''; ?>>Inactivo</option>
    </select><br>

    <input type="submit" value="Editar">
</form>
</body>
</html>
