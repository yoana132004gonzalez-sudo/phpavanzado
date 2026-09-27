<?php
session_start();
include_once("clase_usuario.php");
// Incluimos la conexión centralizada
include_once("conexion.php");

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if (!empty($email) && !empty($password)) {
    $auth = new UsuarioAutenticacion($conexion);
    if ($auth->registrar($email, $password)) {
        header("Location: unidad8.php?reg=ok");
    } else {
        header("Location: unidad8.php?reg=error_dup"); // Email duplicado o error de inserción
    }
} else {
    header("Location: unidad8.php?reg=error_vacios");
}
?>