<?php

$nombre   = "Firulais";
$especie  = "perro";
$edad     = 4;
$peso     = 8.5;
$vacunado = true;
$duenio   = "Ana García";

var_dump($nombre, $especie, $edad, $peso, $vacunado, $duenio);

$edad_meses = $edad * 12;
$peso_gramos = $peso * 1000;
$etapa = ($edad >= 7) ? "Senior" : "Adulto joven";

echo "<h2>=== FICHA DE MASCOTA ===</h2>";
echo "Paciente: $nombre ($especie)<br>";
echo "Dueño: $duenio<br>";
echo "Edad: $edad años ($edad_meses meses) — $etapa<br>";
echo "Peso: $peso kg ($peso_gramos gramos)<br>";
echo "Vacunado: " . ($vacunado ? "Sí" : "No") . "<br>";