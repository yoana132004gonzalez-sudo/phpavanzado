<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        /* Quitamos fondo y marco al section para usarlo como contenedor de bloques */
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

        /* Caja/Bloque Izquierdo: Formulario (50%) */
        .caja-formulario {
            flex: 1 1 50%;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
        }

        /* Caja/Bloque Derecho: Resultado (50%) */
        .caja-resultado {
            flex: 1 1 50%;
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

        .inputs-fecha {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .inputs-fecha div {
            display: flex;
            flex-direction: column;
        }

        .inputs-fecha label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .inputs-fecha input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 70px;
        }

        .btn-calcular {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 15px;
            font-weight: bold;
        }

        .btn-calcular:hover {
            background: #218838;
        }

        .mensaje-exito {
            color: #28a745;
            font-weight: bold;
            font-size: 16px;
            margin: 0;
        }

        .mensaje-error {
            color: #dc3545;
            font-weight: bold;
            font-size: 16px;
            margin: 0;
        }

        .mensaje-espera {
            color: #666;
            font-style: italic;
            margin: 0;
        }
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
        <div class="bloques-separados">
            <!-- Bloque 1: Formulario a la Izquierda -->
            <div class="caja-formulario">
                <h2>Unidad 2 - Cálculo de Fechas</h2>
                <p style="margin-bottom: 15px;">Ingrese una fecha futura:</p>
                <form action="calculo_fecha.php" method="POST">
                    <div class="inputs-fecha">
                        <div>
                            <label>Día:</label>
                            <input type="number" name="dia" min="1" max="31" required>
                        </div>
                        <div>
                            <label>Mes:</label>
                            <input type="number" name="mes" min="1" max="12" required>
                        </div>
                        <div>
                            <label>Año:</label>
                            <input type="number" name="anio" min="2024" max="2100" required style="width: 90px;">
                        </div>
                    </div>
                    <button type="submit" class="btn-calcular">Calcular Días</button>
                </form>
            </div>

            <!-- Bloque 2: Resultado a la Derecha (Alineado Arriba) -->
            <div class="caja-resultado">
                <?php
                if (isset($_GET['dias']) && isset($_GET['fecha'])) {
                    $dias = htmlspecialchars($_GET['dias']);
                    $fecha_ingresada = htmlspecialchars($_GET['fecha']);
                    echo "<p class='mensaje-exito'>Faltan $dias días para la fecha $fecha_ingresada.</p>";
                } elseif (isset($_GET['error'])) {
                    if ($_GET['error'] == 'pasada') {
                        echo "<p class='mensaje-error'>La fecha ingresada ya transcurrió.</p>";
                    } elseif ($_GET['error'] == 'invalida') {
                        echo "<p class='mensaje-error'>La fecha ingresada no existe.</p>";
                    }
                } else {
                    echo "<p class='mensaje-espera'>Ingrese una fecha a la izquierda para calcular los días restantes.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>

</div>
</body>
</html>