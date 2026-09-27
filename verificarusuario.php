<?php
session_start();
include_once("clase_usuario.php");
// Incluimos la conexión centralizada
include_once("conexion.php");

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if (!empty($email) && !empty($password)) {
    $auth = new UsuarioAutenticacion($conexion);
    if ($auth->verificar_login($email, $password)) {
        header("Location: unidad8.php?login=ok");
    } else {
        header("Location: unidad8.php?login=fail");
    }
} else {
    header("Location: unidad8.php?login=error_vacios");
}
?>