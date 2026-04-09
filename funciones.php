<?php
function obtenerFactorEspecie(string $especie): float {
    return match(strtolower($especie)) {
        "perro"           => 1.0,
        "gato"            => 1.1,
        "conejo", "hamster" => 1.2,
        "reptil", "ave"   => 1.35,
        default           => 1.15,
    };
} [7]

function obtenerDescuentoEdad(int $edad): float {
    if ($edad < 1) return 0.15;
    if ($edad <= 8) return 0;
    return 0.10;
} [7]

function calcularPrecio(int $precioBase, string $especie, int $edad): float {
    $factor = obtenerFactorEspecie($especie);
    $desc = obtenerDescuentoEdad($edad);
    return round($precioBase * $factor * (1 - $desc), 2);
} [7]

function generarFicha(string $nombre, string $especie, int $edad, float $peso, bool $vacunado): string {
    $vac = $vacunado ? "Sí" : "No";
    return "
    <table border='1'>
        <tr><th>Nombre</th><td>$nombre</td></tr>
        <tr><th>Especie</th><td>$especie</td></tr>
        <tr><th>Edad</th><td>$edad años</td></tr>
        <tr><th>Peso</th><td>$peso kg</td></tr>
        <tr><th>Vacunado</th><td>$vac</td></tr>
    </table>";
} [8]

// Ejempl:
echo calcularPrecio(3500, "gato", 2); // 3850