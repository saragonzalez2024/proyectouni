<?php
include "conexion.php";
include "precios.php";

// Solo se acepta si viene del formulario
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}

$nombre       = trim($_POST["nombre"]);
$cedula       = trim($_POST["cedula"]);
$telefono     = trim($_POST["telefono"]);
$correo       = trim($_POST["correo"]);
$fecha_retiro = $_POST["fecha"];
$sector       = $_POST["sector"];
$cantidad     = (int) $_POST["cantidad"];
$condicion    = $_POST["condicion"];
$comentario   = trim($_POST["comentario"]);

// Los extras llegan como lista (checkboxes); si no marcó ninguno, queda vacío
if (isset($_POST["extras"])) {
    $extras = implode(", ", $_POST["extras"]);
} else {
    $extras = "";
}

// Validaciones básicas
if ($nombre == "" || $cedula == "" || $telefono == "" || $correo == "" || $cantidad < 1 || !isset($precios[$sector])) {
    die("Datos incompletos o inválidos. <a href='index.php#reserva'>Volver</a>");
}

$total = calcular_total($precios, $sector, $condicion, $cantidad);

$sql = "INSERT INTO reservas (nombre, cedula, telefono, correo, fecha_retiro, sector, cantidad, condicion, extras, comentario, total)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "ssssssisssi", $nombre, $cedula, $telefono, $correo, $fecha_retiro, $sector, $cantidad, $condicion, $extras, $comentario, $total);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?ok=1#reserva");
} else {
    echo "Error al guardar: " . mysqli_error($conexion);
}
?>
