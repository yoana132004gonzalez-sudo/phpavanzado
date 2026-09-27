<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $comentario = trim($_POST['comentario']);

    if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($comentario)) {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha_hora = date("d/m/Y H:i:s");

        // Creamos una celdita/caja independiente con borde para cada comentario
        $texto_html = "<div style='background: #fff; border: 1px solid #ddd; border-radius: 6px; padding: 12px; margin-bottom: 15px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);'>";
        $texto_html .= "<div style='font-size: 12px; color: #777; margin-bottom: 6px;'><strong>Fecha:</strong> $fecha_hora</div>";
        $texto_html .= "<div style='font-size: 14px; color: #333; margin-bottom: 6px;'><strong>Usuario:</strong> " . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . " <span style='color: #666; font-size: 13px;'>(" . htmlspecialchars($email) . ")</span></div>";
        $texto_html .= "<div style='font-size: 14px; color: #444; background: #f9f9f9; padding: 8px; border-radius: 4px; border: 1px solid #eee;'><strong>Comentario:</strong><br>" . nl2br(htmlspecialchars($comentario)) . "</div>";
        $texto_html .= "</div>\n";

        $archivo = fopen("comentarios.txt", "a");
        fputs($archivo, $texto_html);
        fclose($archivo);

        header("Location: unidad3.php?status=ok");
        exit();
    } else {
        header("Location: unidad3.php?status=error");
        exit();
    }
} else {
    header("Location: unidad3.php");
    exit();
}
?>