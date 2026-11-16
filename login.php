<?php
session_start();
include "conexion.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $clave   = $_POST["clave"];

    $stmt = mysqli_prepare($conexion, "SELECT clave FROM usuarios WHERE usuario = ?");
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    $fila = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    // password_verify compara la clave escrita con el hash guardado
    if ($fila && password_verify($clave, $fila["clave"])) {
        session_regenerate_id(true);
        $_SESSION["admin"] = $usuario;
        header("Location: listado.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de administrador</title>
</head>
<body>
    <h1>Ingreso de administrador</h1>

    <?php if ($error != "") { ?>
        <p style="color:red"><?php echo $error; ?></p>
    <?php } ?>

    <form action="login.php" method="post">
        <label for="usuario">Usuario</label><br>
        <input type="text" id="usuario" name="usuario" required>
        <br><br>

        <label for="clave">Contraseña</label><br>
        <input type="password" id="clave" name="clave" required>
        <br><br>

        <input type="submit" value="Ingresar">
    </form>

    <br>
    <a href="index.php">Volver a la página</a>
</body>
</html>
