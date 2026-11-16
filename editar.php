<?php
include "auth.php";
include "conexion.php";
include "precios.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id           = (int) $_POST["id"];
    $nombre       = trim($_POST["nombre"]);
    $cedula       = trim($_POST["cedula"]);
    $telefono     = trim($_POST["telefono"]);
    $correo       = trim($_POST["correo"]);
    $fecha_retiro = $_POST["fecha"];
    $sector       = $_POST["sector"];
    $cantidad     = (int) $_POST["cantidad"];
    $condicion    = $_POST["condicion"];
    $comentario   = trim($_POST["comentario"]);

    if (isset($_POST["extras"])) {
        $extras = implode(", ", $_POST["extras"]);
    } else {
        $extras = "";
    }

    $total = calcular_total($precios, $sector, $condicion, $cantidad);

    $sql = "UPDATE reservas SET nombre=?, cedula=?, telefono=?, correo=?, fecha_retiro=?, sector=?,
            cantidad=?, condicion=?, extras=?, comentario=?, total=? WHERE id=?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssisssii", $nombre, $cedula, $telefono, $correo, $fecha_retiro, $sector, $cantidad, $condicion, $extras, $comentario, $total, $id);
    mysqli_stmt_execute($stmt);

    header("Location: listado.php");
    exit;
}

$id = (int) $_GET["id"];
$stmt = mysqli_prepare($conexion, "SELECT * FROM reservas WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$r = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$r) {
    die("Reserva no encontrada. <a href='listado.php'>Volver</a>");
}

$extras_elegidos = explode(", ", $r["extras"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar reserva</title>
</head>
<body>
    <h1>Editar reserva N° <?php echo $r["id"]; ?></h1>

    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $r["id"]; ?>">

        <label for="nombre">Nombre y apellido</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($r["nombre"]); ?>" required>
        <br><br>

        <label for="cedula">Número de cédula</label><br>
        <input type="text" id="cedula" name="cedula" value="<?php echo htmlspecialchars($r["cedula"]); ?>" required>
        <br><br>

        <label for="telefono">Teléfono</label><br>
        <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($r["telefono"]); ?>" required>
        <br><br>

        <label for="correo">Correo electrónico</label><br>
        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($r["correo"]); ?>" required>
        <br><br>

        <label for="fecha">Fecha de retiro</label><br>
        <input type="date" id="fecha" name="fecha" value="<?php echo $r["fecha_retiro"]; ?>" required>
        <br><br>

        <label for="sector">Sector</label><br>
        <select id="sector" name="sector" required>
            <?php foreach ($precios as $clave => $datos) { ?>
                <option value="<?php echo $clave; ?>" <?php if ($r["sector"] == $clave) echo "selected"; ?>>
                    <?php echo $datos["nombre"]; ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <label for="cantidad">Cantidad de entradas</label><br>
        <input type="number" id="cantidad" name="cantidad" min="1" value="<?php echo $r["cantidad"]; ?>" required>
        <br><br>

        <fieldset>
            <legend>Condición:</legend>
            <input type="radio" id="socio" name="condicion" value="socio" <?php if ($r["condicion"] == "socio") echo "checked"; ?> required>
            <label for="socio">Socio</label><br>
            <input type="radio" id="nosocio" name="condicion" value="no-socio" <?php if ($r["condicion"] == "no-socio") echo "checked"; ?>>
            <label for="nosocio">No socio</label>
        </fieldset>
        <br>

        <fieldset>
            <legend>Extras opcionales:</legend>
            <input type="checkbox" id="estacionamiento" name="extras[]" value="estacionamiento" <?php if (in_array("estacionamiento", $extras_elegidos)) echo "checked"; ?>>
            <label for="estacionamiento">Estacionamiento</label><br>
            <input type="checkbox" id="camiseta" name="extras[]" value="camiseta" <?php if (in_array("camiseta", $extras_elegidos)) echo "checked"; ?>>
            <label for="camiseta">Camiseta</label><br>
            <input type="checkbox" id="programa" name="extras[]" value="programa" <?php if (in_array("programa", $extras_elegidos)) echo "checked"; ?>>
            <label for="programa">Programa del partido</label>
        </fieldset>
        <br>

        <label for="comentario">Comentario</label><br>
        <textarea id="comentario" name="comentario" rows="5" cols="40"><?php echo htmlspecialchars($r["comentario"]); ?></textarea>
        <br><br>

        <input type="submit" value="Guardar cambios">
        <a href="listado.php">Cancelar</a>
    </form>
</body>
</html>
