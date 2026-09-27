<?php
include_once("usuarios.php");

// Instanciación de usuarios (Nombre, Apellido, Fecha de Nacimiento YYYY-MM-DD)
$usuario1 = new Usuarios("Yasmin", "González", "2004-11-25");
$usuario2 = new Usuarios("Elsa", "Gomez", "1986-03-10");

// Llamada al método para imprimir
$usuario1->imprime_caracteristicas();
$usuario2->imprime_caracteristicas();
?>