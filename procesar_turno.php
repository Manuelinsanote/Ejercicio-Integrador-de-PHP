<?php
require_once 'funciones.php'; [10]

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: turno.html");
    exit;
}

$nombre = htmlspecialchars(trim($_POST['nombre_mascota']));
$especie = htmlspecialchars(trim($_POST['especie']));
$edad = (int)$_POST['edad'];
$peso = (float)$_POST['peso'];
$duenio = htmlspecialchars(trim($_POST['duenio']));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$precio_base = (int)$_POST['servicio'];
$errores = [];
if (empty($nombre) || empty($duenio)) $errores[] = "Campos de nombre requeridos.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "Email inválido.";
if ($edad < 0 || $edad > 30) $errores[] = "Edad fuera de rango.";
if ($peso <= 0) $errores[] = "El peso debe ser mayor a 0.";

if (!empty($errores)) {
    echo "<ul style='color:red'>";
    foreach ($errores as $error) echo "<li>$error</li>";
    echo "</ul>";
} else {
    $precio_final = calcularPrecio($precio_base, $especie, $edad);
    echo "<h3>=== TURNO CONFIRMADO ===</h3>";
    echo "Mascota: $nombre ($especie, $edad años, $peso kg)<br>";
    echo "Dueño: $duenio — $email<br>";
    echo "Precio estimado: $" . number_format($precio_final, 2, ',', '.') . "<br>";
    echo "Nos contactaremos para confirmar el horario.";
}
?>