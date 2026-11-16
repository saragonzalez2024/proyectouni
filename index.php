<?php
$mensaje = "";
if (isset($_GET["ok"])) {
    $mensaje = "¡Reserva realizada con éxito!";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Venta de Entrada - Olimpia vs Cerro Porteño</title>
</head>

<body>
    <header>
        <h1>Olimpia vs Cerro Porteño</h1>
        <h2>Estadio Defensores del Chaco</h2>

        <p>
            Fecha: Sábado 18 de Octubre<br>
            Hora: 18:30<br>
            Torneo Clausura - Fecha 20
        </p>
    </header>
    <hr>

    <nav>
        <h3>Menú</h3>

        <ul>
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#sectores">Sectores del estadio</a></li>
            <li><a href="#precios">Precios</a></li>
            <li><a href="#procedimiento">Cómo llegar y retirar</a></li>
            <li><a href="#plano">Plano del estadio</a></li>
            <li><a href="#reserva">Reserva de entradas</a></li>
            <li><a href="#contacto">Contacto</a></li>
            <li><a href="listado.php">Administración (reservas)</a></li>
        </ul>
    </nav>
    <hr>

    <section id="inicio">
        <h2>Información del partido</h2>

        <p>
            El partido entre Olimpia y Cerro Porteño se disputará
            el Sábado 18 de Octubre a las 18:30 horas en el
            Estadio Defensores del Chaco.
        </p>
        <p>
            Desde esta página podrá consultar los sectores disponibles,
            precio de las entradas, ubicación del estadio y también
            realizar una reserva.
        </p>

        <a href="#inicio">Volver al inicio</a>
    </section>

    <hr>

    <section id="sectores">
        <h2>Sectores del Estadio</h2>

        <h3>Platea Preferencial</h3>
        <p>
            Sector ubicado en una zona preferencial del estadio.
            El acceso se realiza por el portón de Platea Preferencial.
        </p>

        <h3>Palco</h3>
        <p>
            Sector de palco con ubicación privilegiada.
            El acceso se realiza por el portón correspondiente a Palco.
        </p>

        <h3>Gradería Norte</h3>
        <p>
            Sector ubicado en la zona norte del estadio.
            El acceso se realiza por los portones de Gradería Norte.
        </p>

        <h3>Gradería Sur</h3>
        <p>
            Sector ubicado en la zona sur del estadio.
            El acceso se realiza por los portones de Gradería Sur.
        </p>

        <h3>Sector Visitante</h3>
        <p>
            Sector destinado a la hinchada visitante.
            El acceso se realiza por el portón correspondiente
            al Sector Visitante.
        </p>

        <a href="#inicio">Volver al inicio</a>
    </section>

    <hr>

    <section id="precios">
        <h2>Precios de las entradas</h2>

        <table border="1">
            <thead>
                <tr>
                    <th>Sector</th>
                    <th>Capacidad</th>
                    <th>Precio General</th>
                    <th>Precio Socio</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Platea Preferencial</td>
                    <td>4.200</td>
                    <td>Gs. 250.000</td>
                    <td>Gs. 180.000</td>
                </tr>
                <tr>
                    <td>Palco</td>
                    <td>1.500</td>
                    <td>Gs. 400.000</td>
                    <td>Gs. 300.000</td>
                </tr>
                <tr>
                    <td>Gradería Norte</td>
                    <td>9.800</td>
                    <td>Gs. 100.000</td>
                    <td>Gs. 70.000</td>
                </tr>
                <tr>
                    <td>Gradería Sur</td>
                    <td>9.800</td>
                    <td>Gs. 100.000</td>
                    <td>Gs. 70.000</td>
                </tr>
                <tr>
                    <td>Sector Visitante</td>
                    <td>6.000</td>
                    <td>Gs. 120.000</td>
                    <td>Gs. 120.000</td>
                </tr>
            </tbody>
        </table>

        <br>
        <a href="#inicio">Volver al inicio</a>
    </section>

    <hr>

    <section id="procedimiento">
        <h2>Procedimiento para llegar y acceder al estadio</h2>

        <ol>
            <li>Llegar hasta las inmediaciones del Estadio Defensores del Chaco.</li>
            <li>Buscar un lugar habilitado para estacionar el vehículo.</li>
            <li>Verificar en la entrada cuál es el portón correspondiente al sector de la entrada adquirida.</li>
            <li>Presentar la entrada o reserva correspondiente al personal encargado.</li>
            <li>Ingresar por el portón indicado y dirigirse al sector correspondiente.</li>
        </ol>

        <a href="#inicio">Volver al inicio</a>
    </section>

    <hr>

    <section id="plano">
        <h2>Plano y ubicación del estadio</h2>

        <p>A continuación se muestra el plano del estadio:</p>

        <img
            src="plano-estadio.jpg"
            alt="Plano del Estadio Defensores del Chaco donde se muestran los diferentes sectores y portones de acceso"
            width="500">

        <br><br>

        <a
            href="https://www.google.com/maps/search/?api=1&query=Estadio+Defensores+del+Chaco+Paraguay"
            target="_blank"
            rel="noopener">
            Ver ubicación del Estadio Defensores del Chaco en Google Maps
        </a>

        <br><br>
        <a href="#inicio">Volver al inicio</a>
    </section>

    <hr>

    <section id="reserva">
        <h2>Reserva de entradas</h2>

        <?php if ($mensaje != "") { ?>
            <p><strong><?php echo $mensaje; ?></strong></p>
        <?php } ?>

        <form action="reservar.php" method="post">

            <label for="nombre">Nombre y apellido</label>
            <br>
            <input type="text" id="nombre" name="nombre" required>

            <br><br>

            <label for="cedula">Número de cédula</label>
            <br>
            <input type="text" id="cedula" name="cedula" required>

            <br><br>

            <label for="telefono">Teléfono</label>
            <br>
            <input type="tel" id="telefono" name="telefono" required>

            <br><br>

            <label for="correo">Correo electrónico:</label>
            <br>
            <input type="email" id="correo" name="correo" required>

            <br><br>

            <label for="fecha">Fecha de retiro:</label>
            <br>
            <input type="date" id="fecha" name="fecha" required>

            <br><br>

            <label for="sector">Sector:</label>
            <br>
            <select id="sector" name="sector" required>
                <option value="">Seleccione un sector</option>
                <option value="platea">Platea Preferencial</option>
                <option value="palco">Palco</option>
                <option value="norte">Gradería Norte</option>
                <option value="sur">Gradería Sur</option>
                <option value="visitante">Sector Visitante</option>
            </select>

            <br><br>

            <label for="cantidad">Cantidad de entradas:</label>
            <br>
            <input type="number" id="cantidad" name="cantidad" min="1" required>

            <br><br>

            <fieldset>
                <legend>Condición:</legend>

                <input type="radio" id="socio" name="condicion" value="socio" required>
                <label for="socio">Socio</label>
                <br>
                <input type="radio" id="nosocio" name="condicion" value="no-socio">
                <label for="nosocio">No socio</label>
            </fieldset>

            <br>

            <fieldset>
                <legend>Extras opcionales:</legend>

                <input type="checkbox" id="estacionamiento" name="extras[]" value="estacionamiento">
                <label for="estacionamiento">Estacionamiento</label>
                <br>
                <input type="checkbox" id="camiseta" name="extras[]" value="camiseta">
                <label for="camiseta">Camiseta</label>
                <br>
                <input type="checkbox" id="programa" name="extras[]" value="programa">
                <label for="programa">Programa del partido</label>
            </fieldset>

            <br>

            <label for="comentario">Comentario:</label>
            <br>
            <textarea id="comentario" name="comentario" rows="5" cols="40"></textarea>

            <br><br>

            <input type="submit" value="Realizar reserva">
            <input type="reset" value="Limpiar formulario">
        </form>

        <br>
        <a href="#inicio">Volver al inicio</a>
    </section>

    <hr>

    <footer id="contacto">
        <h2>Contacto</h2>

        <p>Estadio Defensores del Chaco</p>

        <p>Dirección: Av. Carlos Antonio López, Asunción, Paraguay</p>

        <p>
            Correo:
            <a href="mailto:entradas@defensores.com.py">entradas@defensores.com.py</a>
        </p>

        <p>
            Teléfono:
            <a href="tel:+59500000000">+595 00 000 000</a>
        </p>

        <a href="#inicio">Volver al inicio</a>
    </footer>

</body>

</html>
