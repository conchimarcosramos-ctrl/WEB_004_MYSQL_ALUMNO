<?php
require_once '../config/database.php';
$mensaje = "";
$tipo_mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']??'');
    $descripcion = trim($_POST['descripcion']??'');
    $precio = floatval($_POST['precio']?? 0);
    $cantidad = intval($_POST['cantidad']?? 0);

    if (!empty($nombre) && $precio > 0 && $cantidad > 0){
        $stmt = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $cantidad);

        if ($stmt -> execute()) {
            $mensaje = "Producto agregado exitosamente!";
            $tipo_mensaje = "success";
        } else {
            $mensaje = "Error al agregar el producto: " . $stmt->error;
            $tipo_mensaje = "error";
        }
        $stmt->close();
    } else {
        $mensaje = "Por favor, complete todos los campos requeridos.";
        $tipo_mensaje = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
    <h1> Agregar nuevo producto </h1>

    <nav class="navbar">
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="agregar.php">Agregar Productos</a></li>
        </ul>
    </nav>

    <main class="content">
        <?php if ($mensaje): ?>
            <div class="mensaje <?= $tipo_mensaje ?>">
                <p> <?= $mensaje ?> </p>
            </div>
        <?php endif; ?>

        <form class="form-agregar"  method="POST">
            <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required maxlength="100">
            </div>

            <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"  rows="4"></textarea> 
            </div>

            <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" min="0" required>
            </div>

            <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="0" value="0">
            </div>

            <button type="submit" class="btn-agregar">Agregar Producto</button>
            <a href="productos.php" class="btn-cancelar">Cancelar</a>
        </form>
    </main>
    </div>
</body>
</html>
