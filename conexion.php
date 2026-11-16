<?php
// Datos de conexión (XAMPP por defecto: usuario root, sin contraseña)
$servidor = "localhost";
$usuario  = "root";
$clave    = "";
$base     = "entradas_db";

$conexion = mysqli_connect($servidor, $usuario, $clave, $base);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8mb4");
?>
