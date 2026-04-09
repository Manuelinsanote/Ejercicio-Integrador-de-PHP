<?php
$nombre = "Firulais";
$especie = "perro";
$edad = 4;

$servicios = [
    "consulta"     => 3500,
    "vacuna"       => 5000,
    "cirugia"      => 25000,
    "internacion"  => 8000,
    "peluqueria"   => 4000,
]; [4]

$factor_especie = match($especie) {
    "perro"           => 1.0,
    "gato"            => 1.1,
    "conejo", "hamster" => 1.2,
    "reptil", "ave"   => 1.35,
    default           => 1.15,
};

if ($edad < 1) {
    $descuento = 0.15;
} elseif ($edad <= 8) {
    $descuento = 0;
} else {
    $descuento = 0.10;
}

echo "<h3>=== TABLA DE PRECIOS PARA $nombre ===</h3>";
foreach ($servicios as $servicio => $precio_base) {
    $precio_final = $precio_base * $factor_especie * (1 - $descuento); [5]
    echo ucfirst($servicio) . ": $" . number_format($precio_final, 2, ',', '.') . "<br>";
}

echo "Factor especie: x$factor_especie | Descuento por edad: " . ($descuento * 100) . "%<br>";
