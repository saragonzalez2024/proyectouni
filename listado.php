<?php
include "auth.php";
include "conexion.php";
include "precios.php";

$resultado = mysqli_query($conexion, "SELECT * FROM reservas ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas - Administración</title>
</head>
<body>
    <h1>Reservas de entradas</h1>
    <a href="index.php">Volver a la página</a> | <a href="logout.php">Cerrar sesión</a>
    <br><br>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Fecha de retiro</th>
            <th>Sector</th>
            <th>Cant.</th>
            <th>Condición</th>
            <th>Extras</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo htmlspecialchars($fila["nombre"]); ?></td>
            <td><?php echo htmlspecialchars($fila["cedula"]); ?></td>
            <td><?php echo htmlspecialchars($fila["telefono"]); ?></td>
            <td><?php echo htmlspecialchars($fila["correo"]); ?></td>
            <td><?php echo $fila["fecha_retiro"]; ?></td>
            <td><?php echo $precios[$fila["sector"]]["nombre"]; ?></td>
            <td><?php echo $fila["cantidad"]; ?></td>
            <td><?php echo $fila["condicion"]; ?></td>
            <td><?php echo htmlspecialchars($fila["extras"]); ?></td>
            <td>Gs. <?php echo number_format($fila["total"], 0, ",", "."); ?></td>
            <td>
                <a href="editar.php?id=<?php echo $fila["id"]; ?>">Editar</a>

                <form action="eliminar.php" method="post" style="display:inline"
                      onsubmit="return confirm('¿Eliminar esta reserva?');">
                    <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
