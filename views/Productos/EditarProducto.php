<!-- views/editar.php -->
<form action="index.php?controller=producto&action=editar&id=<?php echo $producto['prod_id']; ?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $producto['prod_nombre']; ?>" required>
    <br>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" value="<?php echo $producto['prod_precio']; ?>" required>
    <br>
    <label for="extra">Extra:</label>
    <input type="checkbox" name="extra" <?php echo $producto['prod_extra'] ? 'checked' : ''; ?>>
    <br>
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen">
    <input type="hidden" name="imagen_actual" value="<?php echo $producto['prod_image']; ?>">
    <?php if ($producto['prod_image']): ?>
        <img src="<?php echo $producto['prod_image']; ?>" alt="Imagen del producto" width="100">
    <?php endif; ?>
    <br>
    <label for="estado">Estado:</label>
    <select name="estado">
        <option value="A" <?php echo $producto['prod_estado'] == 'A' ? 'selected' : ''; ?>>Activo</option>
        <option value="I" <?php echo $producto['prod_estado'] == 'I' ? 'selected' : ''; ?>>Inactivo</option>
        <option value="E" <?php echo $producto['prod_estado'] == 'E' ? 'selected' : ''; ?>>Extra</option>
    </select>
    <br>
    <input type="submit" value="Actualizar">
</form>
