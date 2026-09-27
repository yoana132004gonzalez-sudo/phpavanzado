<?php
session_start();

// Caracteres permitidos (mayúsculas, minúsculas y números, sin caracteres ambiguos)
$caracteres = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
$codigo = substr(str_shuffle($caracteres), 0, 5);

// Guardar en la variable de sesión
$_SESSION['captcha_texto'] = $codigo;

// Crear imagen de 120x40 px
$ancho = 120;
$alto = 40;
$imagen = imagecreatetruecolor($ancho, $alto);

// Definir colores
$fondo = imagecolorallocate($imagen, 240, 240, 240);
$texto = imagecolorallocate($imagen, 30, 30, 30);
$linea = imagecolorallocate($imagen, 180, 180, 180);

imagefill($imagen, 0, 0, $fondo);

// Agregar líneas de ruido visual
for ($i = 0; $i < 4; $i++) {
    imageline($imagen, rand(0, $ancho), rand(0, $alto), rand(0, $ancho), rand(0, $alto), $linea);
}

// Imprimir el texto en la imagen
imagestring($imagen, 5, 35, 12, $codigo, $texto);

// Enviar encabezado e imagen PNG
header("Content-Type: image/png");
imagepng($imagen);
imagedestroy($imagen);
?>