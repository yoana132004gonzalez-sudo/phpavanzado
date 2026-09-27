<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        section {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            box-shadow: none !important;
            width: 100%;
        }

        .bloques-separados {
            display: flex;
            gap: 25px;
            align-items: stretch;
            width: 100%;
        }

        .caja-auth {
            flex: 1 1 50%;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
        }

        .caja-auth h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .btn-submit:hover { background-color: #0056b3; }
        .btn-green { background-color: #28a745; }
        .btn-green:hover { background-color: #218838; }

        .mensaje {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
        }
        .mensaje.error { background-color: #f8d7da; color: #721c24; }
        .mensaje.exito { background-color: #d4edda; color: #155724; }
    </style>
</head>

<body>

<div class="container">
    <header>
        <h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
        <nav>
            <?php include("botonera.php"); ?>
        </nav>
    </header>

    <section>
        <!-- Mensajes de Estado -->
        <?php if (isset($_GET['reg'])): ?>
            <?php if ($_GET['reg'] == 'ok'): ?>
                <div class="mensaje exito">¡Usuario registrado exitosamente con clave encriptada!</div>
            <?php elseif ($_GET['reg'] == 'error_dup'): ?>
                <div class="mensaje error">El correo ingresado ya se encuentra registrado.</div>
            <?php else: ?>
                <div class="mensaje error">Por favor completá todos los campos para el registro.</div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_GET['login'])): ?>
            <?php if ($_GET['login'] == 'ok'): ?>
                <div class="mensaje exito">¡Ingreso exitoso! Las credenciales son correctas.</div>
            <?php elseif ($_GET['login'] == 'fail'): ?>
                <div class="mensaje error">Email o contraseña incorrectos.</div>
            <?php else: ?>
                <div class="mensaje error">Por favor completá todos los campos para ingresar.</div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="bloques-separados">
            <!-- Formulario 1: Usuarios (Registro) -->
            <div class="caja-auth">
                <h2>Usuarios</h2>
                <form id="form-registro" action="cargarusuario.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="reg_email">Email:</label>
                        <input type="email" id="reg_email" name="email" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="reg_password">Contraseña:</label>
                        <input type="password" id="reg_password" name="password" autocomplete="new-password" required>
                    </div>

                    <button type="submit" class="btn-submit btn-green">Registrar Usuario</button>
                </form>
            </div>

            <!-- Formulario 2: Login -->
            <div class="caja-auth">
                <h2>Login</h2>
                <form id="form-login" action="verificarusuario.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="login_email">Email:</label>
                        <input type="email" id="login_email" name="email" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="login_password">Contraseña:</label>
                        <input type="password" id="login_password" name="password" autocomplete="new-password" required>
                    </div>

                    <button type="submit" class="btn-submit">Ingresar</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>

</div>

<script>
    // Limpia automáticamente los campos de ambos formularios al cargar la página
    window.addEventListener('DOMContentLoaded', () => {
        document.getElementById('form-registro').reset();
        document.getElementById('form-login').reset();
    });
</script>

</body>
</html>