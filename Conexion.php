<?php

$host = "localhost";
$nombre_db = "integradorpf";
$usuario = "root";
$contrasena = "";

try {
    $conexion = new PDO("mysql:host=$host; dbname=$nombre_db", $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'si';

} catch (PDOException $exc) {
    echo "Error al conectar a la base de datos:" .$exc->getMessage();
}
?>