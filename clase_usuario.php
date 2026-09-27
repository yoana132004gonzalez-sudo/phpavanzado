<?php
class UsuarioAutenticacion {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    // Registrar usuario con contraseña encriptada
    public function registrar($email, $password) {
        // Encriptar contraseña usando el algoritmo seguro por defecto (BCRYPT)
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO registro (email, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->conexion, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password_hash);
            $resultado = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return $resultado;
        }
        return false;
    }

    // Verificar login comparando el hash almacenado
    public function verificar_login($email, $password) {
        $query = "SELECT password FROM registro WHERE email = ?";
        $stmt = mysqli_prepare($this->conexion, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($resultado)) {
                // Verificar la contraseña plana contra el hash guardado
                if (password_verify($password, $row['password'])) {
                    mysqli_stmt_close($stmt);
                    return true;
                }
            }
            mysqli_stmt_close($stmt);
        }
        return false;
    }
}
?>