<?php
// Incluimos la conexión centralizada a la base phpavanzado
include_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        /* Quitamos el fondo y borde del section para usarlo solo como contenedor */
        section {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            box-shadow: none !important;
            width: 100%;
        }

        .bloques-separados {
            display: flex;
            gap: 25px; /* Espacio entre ambos bloques */
            align-items: stretch; /* Ambos bloques mantienen la misma altura */
            width: 100%;
        }

        /* Caja/Bloque 1: Listado (Exactamente la mitad) */
        .caja-listado {
            flex: 1 1 50%;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px; /* Más espacio interno */
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
        }

        /* Caja/Bloque 2: Formulario (Exactamente la mitad) */
        .caja-formulario {
            flex: 1 1 50%;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px; /* Más espacio interno */
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
        }

        .caja-listado h2, 
        .caja-formulario h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .form-group { 
            margin-bottom: 18px; 
        }
        
        .form-group label { 
            display: block; 
            margin-bottom: 8px; 
            font-size: 15px;
            font-weight: bold;
            color: #333; 
        }
        
        .form-group input { 
            width: 100%; 
            padding: 10px; 
            box-sizing: border-box; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            background-color: #fff;
            font-size: 14px;
        }
        
        .btn-guardar { 
            background: #28a745; 
            color: white; 
            border: none; 
            padding: 12px 15px; 
            cursor: pointer; 
            border-radius: 4px; 
            width: 100%; 
            font-size: 16px; 
            font-weight: bold;
            margin-top: 10px;
        }
        
        .btn-guardar:hover { 
            background: #218838; 
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
            <!-- Bloque Independiente 1: Listado -->
            <div class="caja-listado">
                <h2>Listado de Clases Registradas</h2>
                <?php include('ver_clases.php'); ?>
            </div>

            <!-- Bloque Independiente 2: Formulario -->
            <div class="caja-formulario">
                <h2>Cargar Nueva Clase</h2>
                <form action="insertar_clases.php" method="POST">
                    <div class="form-group">
                        <label for="unidad">Unidad:</label>
                        <input type="text" id="unidad" name="unidad" required maxlength="50" placeholder="Ej: Unidad 3: PHP Avanzado">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" required>
                    </div>
                    <button type="submit" class="btn-guardar">Guardar Clase</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzada</a>
    </footer>

</div>
</body>
</html>