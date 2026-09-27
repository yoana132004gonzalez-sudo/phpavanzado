<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $unidad = $_POST['unidad'];
    $fecha = $_POST['fecha'];

    // Incluimos la conexión centralizada
    include_once("conexion.php");

    $sql = "INSERT INTO clases (unidad, fecha) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $unidad, $fecha);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    header("Location: unidad1.php");
    exit();
}
?>