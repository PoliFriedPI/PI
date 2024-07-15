<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
</head>
<body>
<h1>Editar Perfil</h1>
<form action="index.php?controller=perfil&action=editar&id=<?php echo $perfil['per_id']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $perfil['per_nombre']; ?>" required>
    <br>
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="<?php echo $perfil['per_apellido']; ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $perfil['per_email']; ?>" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?php echo $perfil['per_password']; ?>" required>
    <br>
    <label for="rol_id">Rol ID:</label>
    <input type="number" id="rol_id" name="rol_id" value="<?php echo $perfil['rol_id']; ?>" required>
    <br>
    <button type="submit">Guardar</button>
</form>
</body>
</html>

