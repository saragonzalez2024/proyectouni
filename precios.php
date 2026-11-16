<?php
// Precios y nombres de cada sector (los mismos de la tabla de la página)
$precios = [
    "platea"    => ["nombre" => "Platea Preferencial", "general" => 250000, "socio" => 180000],
    "palco"     => ["nombre" => "Palco",               "general" => 400000, "socio" => 300000],
    "norte"     => ["nombre" => "Gradería Norte",      "general" => 100000, "socio" => 70000],
    "sur"       => ["nombre" => "Gradería Sur",        "general" => 100000, "socio" => 70000],
    "visitante" => ["nombre" => "Sector Visitante",    "general" => 120000, "socio" => 120000],
];

// Calcula el total de la reserva
function calcular_total($precios, $sector, $condicion, $cantidad) {
    if (!isset($precios[$sector])) {
        return 0;
    }
    $precio = ($condicion == "socio") ? $precios[$sector]["socio"] : $precios[$sector]["general"];
    return $precio * $cantidad;
}
?>
