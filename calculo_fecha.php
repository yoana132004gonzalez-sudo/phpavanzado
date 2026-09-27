<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dia = intval($_POST['dia']);
    $mes = intval($_POST['mes']);
    $anio = intval($_POST['anio']);

    // 1. Validar que la fecha sea real (ejemplo: evita 31 de Febrero)
    if (checkdate($mes, $dia, $anio)) {
        
        // Creamos la fecha ingresada y la fecha actual
        $fecha_ingresada = new DateTime("$anio-$mes-$dia");
        $hoy = new DateTime(date('Y-m-d')); // Fecha de hoy a las 00:00:00

        // 2. Comprobar si la fecha es del pasado
        if ($fecha_ingresada < $hoy) {
            header("Location: unidad2.php?error=pasada");
            exit();
        } else {
            // 3. Calcular la diferencia exacta de días
            $diferencia = $hoy->diff($fecha_ingresada);
            $dias_faltantes = $diferencia->days;
            
            // Damos formato visual DD/MM/AAAA a la fecha ingresada
            $fecha_formateada = sprintf("%02d/%02d/%04d", $dia, $mes, $anio);

            // Redireccionamos a unidad2.php enviando los datos para mostrar
            header("Location: unidad2.php?dias=" . $dias_faltantes . "&fecha=" . urlencode($fecha_formateada));
            exit();
        }
    } else {
        // Si ingresaron una fecha inválida
        header("Location: unidad2.php?error=invalida");
        exit();
    }
} else {
    // Si entran directo al archivo sin usar el formulario
    header("Location: unidad2.php");
    exit();
}
?>