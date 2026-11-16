<?php

include "conexion.php";

$mensaje = "";

$total = mysqli_fetch_row(mysqli_query($conexion, "SELECT COUNT(*) FROM usuarios"))[0];
if ($total > 0) {
    die("Ya existe un administrador. Borrá este archivo (crear_admin.php).");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $clave   = $_POST["clave"];

    if ($usuario == "" || strlen($clave) < 8) {
        $mensaje = "Usuario obligatorio y contraseña de al menos 8 caracteres";
    } else {
        $hash = password_hash($clave, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conexion, "INSERT INTO usuarios (usuario, clave) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $hash);
        mysqli_stmt_execute($stmt);

        die("Administrador creado. <strong>Ahora borrá crear_admin.php</strong> y entrá por <a href='login.php'>login.php</a>");
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear administrador</title>
</head>
<body>
    <h1>Crear administrador</h1>

    <?php if ($mensaje != "") { ?>
        <p style="color:red"><?php echo $mensaje; ?></p>
    <?php } ?>

    <form action="crear_admin.php" method="post">
        <label for="usuario">Usuario</label><br>
        <input type="text" id="usuario" name="usuario" required>
        <br><br>

        <label for="clave">Contraseña (mínimo 8 caracteres)</label><br>
        <input type="password" id="clave" name="clave" required>
        <br><br>

        <input type="submit" value="Crear">
    </form>
</body>
</html>
