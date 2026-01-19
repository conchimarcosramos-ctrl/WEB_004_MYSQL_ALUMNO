<?php
require_once 'config/database.php';

$titulo = 'Gestor de Productos';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titulo ?> </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <h1> <?= $titulo ?> </h1>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="pages/productos.php">Productos</a></li>
            <li><a href="pages/agregar.php">Agregar</a></li>
        </ul>
    </nav>

    <main class="content">
            <h2>Bienvenido a <?= $titulo ?> </h2>
            <p> Este es un simple gestor de productos integrado con una base de datos mysql</p>
            
            <section class="wellcome-info">
                <h3>Instrucciones</h3>
                <ul>
                    <li>Navega a Productos para ver la lista completa</li>
                    <li>Agregar producto para insertar nuevos elementos</li>
                    <li>Se puede editar o eliminar productos desde la propia lista</li>
                </ul>
            </section>  
            
            <?php
            //Mostrar estadísticas
            $resultado = $conexion->query("SELECT COUNT(*) as total FROM productos");
            if ($resultado) {
                $fila = $resultado->fetch_assoc();
                echo "<p><strong>Total de Productos en la Base de Datos:</strong> {$fila['total']}</p>";
            }
            ?>
    </main>
    </div>
</body>
</html>