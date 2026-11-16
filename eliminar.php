<?php
include "auth.php";
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST["id"];

    $stmt = mysqli_prepare($conexion, "DELETE FROM reservas WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: listado.php");
?>
