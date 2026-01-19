<?php
require_once 'config/database.php';

//Obtenemos todos los productos
$titulo = 'Lista de Productos'; 
$resultado = $conexion->query("SELECT * FROM productos ORDER BY nombre ASC");
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
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="agregar.php">Agregar Productos</a></li>
        </ul>
    </nav>

    <main class="content">
        <table class="tabla-productos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($resultado && $resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['id_productos'] . "</td>";
                    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
                    echo "<td>\$" . number_format($fila['precio'], 2) . "</td>";
                    echo "<td>" . $fila['cantidad'] . "</td>";
                    echo "<td>";
                    echo "<a href='eliminar.php?id=" . $fila['id_productos'] . "' class='btn-eliminar' onclick='return confirm(\'¿Seguro que quieres eliminar el producto?\');'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo '<tr><td colspan="6">No hay productos en la base de datos</td></tr>';
            }
            ?>
        </tbody>
        </table>
    </main>
    </div>
</body>
</html>