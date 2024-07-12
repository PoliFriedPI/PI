<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Perfil</title>
</head>
<body>
<h1>Crear Perfil</h1>
<form action="index.php?controller=perfil&action=crear" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="rol_id">Rol ID:</label>
    <input type="number" id="rol_id" name="rol_id" required>
    <br>
    <button type="submit">Crear</button>
</form>
</body>
</html>
