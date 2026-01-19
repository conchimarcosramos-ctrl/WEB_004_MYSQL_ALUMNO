CREATE TABLE IF NOT EXISTS productos(
    id_productos AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL (10,2) NOT NULL,
    cantidad INT DEFAULT 0,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_nombre (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;
COLLATE utf8mb4_unicode_ci;

-- INSERTAMOS PRODUCTOS DE EJEMPLO -- 
INSERT INTO productos (nombre, descripcion, precio, cantidad) VALUES
    ('LAPTOP', 'Laptos Intel Core i5, 8Gb RAM, 256Gb SSD', 599.99, 5),
    ('MOUSE', 'Mouse inalámbrico USB', 19.99, 50),          
    ('TECLADO', 'Teclado mecánico RGB', 79.99, 15),
    ('MONITOR', 'Monitor 27 pulgadas 1440p', 299.99, 8);

    

