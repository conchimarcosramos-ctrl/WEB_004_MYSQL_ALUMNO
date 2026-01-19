<?php
//configuramos la base de datos

//desarrollamos la base de datos en localhost con mysql y xampp
define('DB_HOST', 'localhost');
define('DB_USER', 'alumno_tienda_usr');
define('DB_PASS', '123456789Abc');
define('DB_NAME', 'alumno_tienda_db');
define('DB_CHARSET', 'utf8mb4');
define('DB_PORT', '3306');

//Conectamos la base de datos
$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

//Comprobamos la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

//Comprobamos la codificación a UTF-8
if (!$conexion->set_charset('utf8mb4')) {
    die("Error cargando el conjunto de caracteres utf8mb4: " . $conexion->error);
}

//Ejecutamos queries de forma segura
function ejecutarQuery ($sql, $tipos ='', $parametros = []) {
    global $conexion;

    if ($tipos && $parametros) {
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            return false;
        }   
        $stmt->bind_parm($tipos, ...$parametros);
        $stmt->execute();
        return $stmt;   
    } else {
        $conexion->query($sql);
    }
}

//Cerramos la conexión
function cerrarConexion() {
    global $conexion;
    $conexion->close();
}
?>
