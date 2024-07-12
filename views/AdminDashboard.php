<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .sidebar-inicio{
            background-color: #BC2628;
            width: 250px;
            display: flex;
            align-content: center;
            justify-content: center;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #f2f2f2;
            position: fixed;
            top: 0;
            left: 0;
            border-right: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar img {
            width: 70px;
            height: 70px;
            margin-bottom: 10px;
            margin-top: 10px;
            border-radius: 50px;
        }
        .sidebar .inicio-button {
            text-decoration: none;
            color: white;
            background-color: #fbbd08;
            border: none;
            padding: 12px 40px;
            border-radius: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            margin-top: 20px;
            cursor: pointer;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }
        .sidebar ul li {
            width: 70%;
            padding: 10px 38px;
            text-align: left;
            border-top: 1px solid #ddd;
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        .sidebar ul li:first-child {
            border-top: none;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            width: 100%;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        .sidebar ul li label{
            text-decoration: none;
            color: #BC2628;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar ul li a img {
            margin-right: 10px;
            height:22px;
            width: 22px;

        }
        .sidebar ul li:hover {
            background-color: #eaeaea;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f9f9f9;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            margin: 0;
            font-size: 37px;
        }
        .header .user-info {
            display: flex;
            align-items: center;
        }
        .header .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .header .user-info span {
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="sidebar-inicio">
        <img src="Assets/logo-calaca.jpg" alt="Logo">
    </div>
    <form method="post">
        <button class="inicio-button" type="submit" name="cerrar_sesion">
            <a href="logout.php">Logout</a>
        </button>
    </form>
    <ul>
        <li><label>Mantenimiento</label></li>
        <li><a href="ListarPefil.php"><img class="sidebar-icons" src="Assets/users-icon.png" alt="Icono Usuarios">Perfiles</a></li>
        <li><a href="#"><img class="sidebar-icons" src="Assets/combos-icon.png" alt="Icono Combos">Combos</a></li>
        <li><a href="#"><img class="sidebar-icons" src="Assets/productos-icon.png" alt="Icono Productos">Productos</a></li>
        <li><a href="#"><img class="sidebar-icons" src="Assets/categorias-icon.png" alt="Icono Categorías">Categorías</a></li>
        <li><a href="#"><img class="sidebar-icons" src="Assets/pedidos-icon.png" alt="Icono Pedidos">Pedidos</a></li>
        <li><a href="#"><img class="sidebar-icons" src="Assets/sucursales-icon.png" alt="Icono Sucursales">Sucursales</a></li>
        <li><a href="#"><img class="sidebar-icons" src="Assets/pagos-icon.png" alt="Icono Formas de Pago">Formas de pago</a></li>
    </ul>
</div>
<div class="content">
    <div class="header">
        <h1>¡Bienvenido!</h1>
        <div class="user-info">
            <img src="Assets/account-icon.png" alt="User Avatar">
            <h1>Bienvenido, <?php echo $_SESSION['user_name']; ?></h1>
            <p>Esta es la página del panel de administración.</p>
        </div>
    </div>
</div>
</body>
</html>