<?php
require_once 'config/database.php';

if (isset($_GET['id'])) {
    $id = intval ($_GET['id']);

    $stmt = $conexion->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: productos.php?mensaje=eliminado");
    } else {
        header("Location: productos.php?error=no_eliminar");
    }
    $stmt->close();
} else {
    header("Location: productos.php");
}
?>