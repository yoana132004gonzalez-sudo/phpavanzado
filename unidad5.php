<?php
session_start();

// Generar código Captcha mezclando mayúsculas, minúsculas y números
if (!isset($_SESSION['captcha_texto'])) {
    $caracteres = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
    $_SESSION['captcha_texto'] = substr(str_shuffle($caracteres), 0, 5);
}
?>
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

        .caja-formulario {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
        }

        .caja-formulario h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
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

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .captcha-box {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .captcha-code {
            background: #e0e0e0;
            color: #222;
            font-weight: bold;
            font-size: 22px;
            letter-spacing: 5px;
            padding: 8px 16px;
            border-radius: 4px;
            border: 1px dashed #666;
            user-select: none;
            font-family: monospace;
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

        .btn-submit:hover {
            background-color: #0056b3;
        }

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
        <div class="caja-formulario">
            <h2>Formulario de Consulta</h2>

            <?php if (isset($_GET['ok'])): ?>
                <div class="mensaje exito">¡Consulta enviada exitosamente!</div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="mensaje error">
                    <?php 
                        if ($_GET['error'] == 'captcha') echo "El código Captcha ingresado es incorrecto (respetá mayúsculas y minúsculas).";
                        elseif ($_GET['error'] == 'campos') echo "Por favor completá todos los campos.";
                        else echo "Ocurrió un error al guardar la consulta.";
                    ?>
                </div>
            <?php endif; ?>

            <form action="cargar_consulta.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="consulta">Consulta:</label>
                    <textarea id="consulta" name="consulta" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="captcha">Código de Seguridad (respetar mayúsculas y minúsculas):</label>
                    <div class="captcha-box">
                        <span class="captcha-code"><?php echo $_SESSION['captcha_texto']; ?></span>
                        <input type="text" id="captcha" name="captcha" placeholder="Ingrese el código exacto" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Enviar Consulta</button>
            </form>
        </div>
    </section>

    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>

</div>
</body>
</html>