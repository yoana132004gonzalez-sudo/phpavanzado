<?php
class Usuarios {
    // Propiedades privadas (no accesibles fuera de la clase)
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;

    // Constructor para inicializar los datos
    public function __construct($nombre, $apellido, $fecha_nacimiento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fecha_nacimiento = $fecha_nacimiento; // Formato esperado: 'YYYY-MM-DD'
    }

    // Método privado para calcular la edad (no accesible desde fuera)
    private function calcular_edad() {
        $nacimiento = new DateTime($this->fecha_nacimiento);
        $hoy = new DateTime();
        $edad = $hoy->diff($nacimiento);
        return $edad->y;
    }

    // Método público para imprimir las características
    public function imprime_caracteristicas() {
        $edad = $this->calcular_edad();
        echo "<div class='card-usuario'>";
        echo "<p><strong>Nombre:</strong> " . htmlspecialchars($this->nombre) . "</p>";
        echo "<p><strong>Apellido:</strong> " . htmlspecialchars($this->apellido) . "</p>";
        echo "<p><strong>Edad:</strong> " . $edad . " años</p>";
        echo "</div>";
    }
}
?>