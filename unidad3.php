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

        /* Bloque Izquierdo: Lista de Comentarios (50%) */
        .caja-comentarios {
            flex: 1 1 50%;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
        }

        /* Bloque Derecho: Formulario (50%) */
        .caja-formulario {
            flex: 1 1 50%;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
        }

        .caja-formulario h2, 
        .caja-comentarios h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        .form-group input, 
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: inherit;
        }

        .btn-guardar {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 15px;
            font-weight: bold;
            width: 100%;
            margin-top: 5px;
        }

        .btn-guardar:hover {
            background: #218838;
        }

        /* Contenedor con scroll para las celdas de comentarios */
        .lista-comentarios {
            max-height: 350px;
            overflow-y: auto;
            padding-right: 5px;
        }

        .mensaje-espera {
            color: #666;
            font-style: italic;
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
            <!-- Izquierda: Celdas de Comentarios -->
            <div class="caja-comentarios">
                <h2>Comentarios Guardados</h2>
                <div class="lista-comentarios">
                    <?php
                    $archivo_path = "comentarios.txt";

                    if (file_exists($archivo_path) && filesize($archivo_path) > 0) {
                        $archivo = fopen($archivo_path, "r");
                        $contenido = fread($archivo, filesize($archivo_path));
                        fclose($archivo);

                        echo $contenido;
                    } else {
                        echo "<p class='mensaje-espera'>Aún no hay comentarios guardados en el archivo txt.</p>";
                    }
                    ?>
                </div>
            </div>

            <!-- Derecha: Formulario Cargar Comentario -->
            <div class="caja-formulario">
                <h2>Cargar Comentario</h2>
                <form action="comentarios.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required placeholder="Tu apellido">
                    </div>
                    <div class="form-group">
                        <label for="email">Mail:</label>
                        <input type="email" id="email" name="email" required placeholder="tu@email.com">
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <textarea id="comentario" name="comentario" rows="3" required placeholder="Escribí tu comentario..."></textarea>
                    </div>
                    <button type="submit" class="btn-guardar">Enviar Comentario</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>

</div>
</body>
</html>