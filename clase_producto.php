<?php
class Producto {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function introducir_producto($nombre, $descripcion, $precio) {
        $query = "INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->conexion, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssd", $nombre, $descripcion, $precio);
            $resultado = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return $resultado;
        }
        return false;
    }

    public function listar_producto() {
        $query = "SELECT * FROM productos ORDER BY id_producto DESC";
        $resultado = mysqli_query($this->conexion, $query);
        $productos = [];
        if ($resultado) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $productos[] = $fila;
            }
        }
        return $productos;
    }

    public function eliminar_producto($id_producto) {
        $query = "DELETE FROM productos WHERE id_producto = ?";
        $stmt = mysqli_prepare($this->conexion, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id_producto);
            $resultado = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return $resultado;
        }
        return false;
    }
}
?>