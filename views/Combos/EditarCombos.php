<!DOCTYPE html>
<html>
<head>
    <title>Editar Combo</title>
</head>
<body>
<h1>Editar Combo</h1>
<form action="index.php?controller=combo&action=editar_combo&id=<?php echo isset($combo['com_id']) ? $combo['com_id'] : ''; ?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo isset($combo['com_nombre']) ? $combo['com_nombre'] : ''; ?>" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required><?php echo isset($combo['com_descripcion']) ? $combo['com_descripcion'] : ''; ?></textarea><br>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" value="<?php echo isset($combo['com_precio']) ? $combo['com_precio'] : ''; ?>" required><br>

    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria" required>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?php echo $cat['cat_id']; ?>" <?php echo isset($combo['cat_id']) && $cat['cat_id'] == $combo['cat_id'] ? 'selected' : ''; ?>>
                <?php echo $cat['cat_nombre']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="imagen_actual">Imagen Actual:</label><br>
    <img src="<?php echo $combo['com_imagen']; ?>" width="100" height="100"><br>

    <label for="imagen">Nueva Imagen (si desea cambiarla):</label>
    <input type="file" name="imagen" id="imagen"><br>

    <label for="estado">Estado:</label>
    <select name="estado" id="estado" required>
        <option value="A" <?php echo isset($combo['com_estado']) && $combo['com_estado'] == 'A' ? 'selected' : ''; ?>>Activo</option>
        <option value="I" <?php echo isset($combo['com_estado']) && $combo['com_estado'] == 'I' ? 'selected' : ''; ?>>Inactivo</option>
    </select><br>

    <input type="submit" value="Editar">
</form>
</body>
</html>
