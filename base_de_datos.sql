-- Importar desde phpMyAdmin (pestaña "Importar") o pegar en la pestaña SQL
CREATE DATABASE IF NOT EXISTS entradas_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE entradas_db;

CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cedula VARCHAR(20) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    fecha_retiro DATE NOT NULL,
    sector VARCHAR(20) NOT NULL,
    cantidad INT NOT NULL,
    condicion VARCHAR(10) NOT NULL,
    extras VARCHAR(100) DEFAULT '',
    comentario TEXT,
    total INT NOT NULL,
    creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Usuarios que pueden entrar a la administración (el admin se crea con crear_admin.php)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
);
