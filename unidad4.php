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

        .caja-marca, .caja-thumb {
            flex: 1 1 50%;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
            text-align: center;
        }

        .caja-marca h2, .caja-thumb h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            text-align: left;
        }

        .contenedor-marca {
            position: relative;
            display: inline-block;
            max-width: 100%;
        }

        .img-base {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            border: 1px solid #ddd;
            display: block;
        }

        /* Marca de agua centrada con transparencia real */
        .img-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 55%;
            opacity: 0.45;                   /* Transparencia suave */
            mix-blend-mode: multiply;        /* Hace transparente el fondo blanco */
            pointer-events: none;
        }

        .img-thumb {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
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
            <!-- Izquierda: Marca de Agua -->
            <div class="caja-marca">
                <h2>Marca de Agua Aplicada</h2>
                <div class="contenedor-marca">
                    <!-- 1. La imagen base va primero -->
                    <img src="imagenes/unidad4.png" class="img-base" alt="Imagen base">
                    <!-- 2. La marca de agua lleva la clase 'img-watermark' para que flote encima -->
                    <img src="imagenes/marca.png" class="img-watermark" alt="Marca de agua">
                </div>
            </div>

            <!-- Derecha: Thumbnail 150x150 -->
            <div class="caja-thumb">
                <h2>Thumbnail (150x150px)</h2>
                <!-- Se asigna la clase 'img-thumb' y la ruta correcta 'imagenes/unidad4.png' -->
                <img src="imagenes/unidad4.png" class="img-thumb" alt="Thumbnail 150x150">
                <p style="font-size: 13px; color: #666; margin-top: 10px;">Medida: 150px x 150px</p>
            </div>
        </div>
    </section>

    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>

</div>
</body>
</html>