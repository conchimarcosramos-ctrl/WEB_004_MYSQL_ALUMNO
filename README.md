
# Gestor de Productos - Aplicación Web

## Descripción

Aplicación web simple para gestionar un catálogo de productos integrada con base de datos MySQL. Desarrollada como ejercicio educativo para aprender desarrollo web full-stack.

## Características

- Visualizar lista de productos
- Agregar nuevos productos
- Eliminar productos existentes
- Validación de datos
- Interfaz responsiva
- Conexión segura a base de datos MySQL

## Requisitos

- PHP 8.0 o superior
- MySQL 5.7 o superior
- Servidor web (Apache, Nginx, etc.)

## Instalación

1. Clona el repositorio
2. Copia `config/database.php` y configura tus credenciales MySQL
3. Importa el archivo `sql/schema.sql` en tu base de datos
4. Accede a la aplicación a través de tu servidor web

## Estructura del Proyecto

proyecto/
├── index.php              # Página principal
├── config/
│   └── database.php       # Configuración de conexión BD
├── css/
│   └── style.css          # Estilos de la aplicación
├── js/
│   └── script.js          # JavaScript (opcional)
├── pages/
│   ├── productos.php      # Listar productos
│   ├── agregar.php        # Formulario para agregar
│   └── eliminar.php       # Script para eliminar
├── sql/
│   └── schema.sql         # Estructura de base de datos
└── README.md              # Este archivo