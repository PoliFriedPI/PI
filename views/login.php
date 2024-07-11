<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login pi</title>
</head>
<body>
<h2>Login</h2>
<form action="../index.php?action=login" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>
<?php
if (isset($_GET['error'])) {
    echo "<p style='color: red;'>" . $_GET['error'] . "</p>";
}
?>
</body>
</html>
