<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php
session_start();
$disabled = isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time'] ? 'disabled' : '';
?>
<form action="../index.php?action=login" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required <?= $disabled ?>>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required <?= $disabled ?>>
    <br>
    <button type="submit" <?= $disabled ?>>Login</button>
</form>
<?php
if (isset($_GET['error'])) {
    echo "<script>alert('" . $_GET['error'] . "');</script>";
}
?>
</body>
</html>
