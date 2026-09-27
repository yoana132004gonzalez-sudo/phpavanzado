<?php
session_start();

// Incluimos la conexión centralizada
include_once("conexion.php");

$nombre = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$email = trim($_POST['email'] ?? '');
$consulta = trim($_POST['consulta'] ?? '');
$captcha_usuario = trim($_POST['captcha'] ?? '');

// 1. Validar campos requeridos
if (empty($nombre) || empty($apellido) || empty($email) || empty($consulta) || empty($captcha_usuario)) {
    header("Location: unidad5.php?error=campos");
    exit();
}

// 2. Validar Captcha exacto (case-sensitive)
if (!isset($_SESSION['captcha_texto']) || $captcha_usuario !== $_SESSION['captcha_texto']) {
    unset($_SESSION['captcha_texto']);
    header("Location: unidad5.php?error=captcha");
    exit();
}

// 3. Insertar consulta en la base de datos
$query = "INSERT INTO consultas (nombre, apellido, email, consulta) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssss", $nombre, $apellido, $email, $consulta);
    
    if (mysqli_stmt_execute($stmt)) {
        unset($_SESSION['captcha_texto']);
        header("Location: unidad5.php?ok=1");
    } else {
        header("Location: unidad5.php?error=db");
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: unidad5.php?error=db");
}
?>