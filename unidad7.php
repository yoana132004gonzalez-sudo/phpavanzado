<?php
// 1. Incluimos primero la conexión centralizada y luego la clase Producto
include_once("conexion.php");
include_once("clase_producto.php");

$prod = new Producto($conexion);
$mensaje = "";

// Cargar Producto (introducir_producto)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cargar_producto'])) {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = floatval($_POST['precio']);

    if (!empty($nombre) && !empty($descripcion) && $precio > 0) {
        if ($prod->introducir_producto($nombre, $descripcion, $precio)) {
            $mensaje = "<div class='mensaje exito'>Producto cargado exitosamente.</div>";
        } else {
            $mensaje = "<div class='mensaje error'>Error al cargar el producto.</div>";
        }
    } else {
        $mensaje = "<div class='mensaje error'>Por favor completá todos los campos correctamente.</div>";
    }
}

// Eliminar Producto (eliminar_producto)
if (isset($_GET['eliminar'])) {
    $id_eliminar = intval($_GET['eliminar']);
    if ($prod->eliminar_producto($id_eliminar)) {
        header("Location: unidad7.php?ok_del=1");
        exit();
    } else {
        $mensaje = "<div class='mensaje error'>Error al eliminar el producto.</div>";
    }
}

if (isset($_GET['ok_del'])) {
    $mensaje = "<div class='mensaje exito'>Producto eliminado correctamente.</div>";
}

// Listar Productos (listar_producto)
$lista_productos = $prod->listar_producto();
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

        .bloques-separados {
            display: flex;
            gap: 25px;
            align-items: flex-start;
            width: 100%;
        }

        .caja-form, .caja-tabla {
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 25px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.06);
            box-sizing: border-box;
        }

        .caja-form { flex: 1 1 40%; }
        .caja-tabla { flex: 1 1 60%; }

        .caja-form h2, .caja-tabla h2 {
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

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
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

        /* Estilos de Tabla */
        table.tabla-prod {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.tabla-prod th, table.tabla-prod td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        table.tabla-prod th {
            background-color: #f4f4f4;
            color: #333;
        }

        .btn-eliminar {
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 13px;
            display: inline-block;
        }

        .btn-eliminar:hover { background-color: #c82333; }

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
        <?php echo $mensaje; ?>

        <div class="bloques-separados">
            <!-- Izquierda: Formulario de Carga -->
            <div class="caja-form">
                <h2>Cargar Producto</h2>
                <form action="unidad7.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="nombre">Nombre del Producto:</label>
                        <input type="text" id="nombre" name="nombre" autocomplete="off" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" rows="3" required maxlength="255"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio ($):</label>
                        <input type="number" id="precio" name="precio" step="0.01" min="0" required>
                    </div>

                    <button type="submit" name="cargar_producto" class="btn-submit">Guardar Producto</button>
                </form>
            </div>

            <!-- Derecha: Tabla de Productos Cargados -->
            <div class="caja-tabla">
                <h2>Lista de Productos</h2>
                <?php if (!empty($lista_productos)): ?>
                    <table class="tabla-prod">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista_productos as $p): ?>
                                <tr>
                                    <td><strong><?php echo $p['id_producto']; ?></strong></td>
                                    <td><strong><?php echo htmlspecialchars($p['nombre']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($p['descripcion']); ?></td>
                                    <td>$<?php echo number_format($p['precio'], 2, ',', '.'); ?></td>
                                    <td>
                                        <a href="unidad7.php?eliminar=<?php echo $p['id_producto']; ?>" 
                                           class="btn-eliminar" 
                                           onclick="return confirm('¿Seguro que querés eliminar este producto?');">
                                           Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p style="color: #777;">No hay productos registrados en la base de datos.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>

</div>
</body>
</html>