<?php
// Incluimos la conexión centralizada
include_once("conexion.php");

$sql = "SELECT id_clase, unidad, fecha FROM clases ORDER BY id_clase DESC";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 100%; max-width: 500px; background: white;'>";
    echo "<tr style='background: #e9ecef;'><th>ID</th><th>Unidad</th><th>Fecha</th></tr>";
    
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $fecha_f = date("d/m/Y", strtotime($fila['fecha']));
        echo "<tr>";
        echo "<td align='center'>" . $fila['id_clase'] . "</td>";
        echo "<td>" . htmlspecialchars($fila['unidad']) . "</td>";
        echo "<td align='center'>" . $fecha_f . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay clases registradas aún.</p>";
}
?>