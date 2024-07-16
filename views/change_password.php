<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
</head>
<body>
<h2>Cambiar Contraseña</h2>
<form action="index.php?controller=login&action=changePassword" method="POST">
    <label for="new_password">Nueva Contraseña:</label>
    <input type="password" id="new_password" name="new_password" required>
    <br>
    <button type="submit">Cambiar Contraseña</button>
</form>
</body>
</html>
