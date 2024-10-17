CREATE DATABASE IF NOT EXISTS seguridad_db;
USE seguridad_db;

-- Crear tabla roles si no existe
CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    rol_nombre VARCHAR(50) NOT NULL
);

-- Insertar 3 registros en la tabla roles
INSERT INTO roles (rol_nombre) VALUES 
('Administrador'),
('Usuario'),
('Invitado');

-- Crear tabla usuarios si no existe
CREATE TABLE IF NOT EXISTS usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol_id INT,
    FOREIGN KEY (rol_id) REFERENCES roles(id)
);

-- Insertar 3 registros en la tabla usuarios
INSERT INTO usuarios (nombre, email, password, rol_id) VALUES
('Juan Pérez', 'juan.perez@example.com', '$2y$10$eXAMPLEHASHEDPASSWORD123', 1),
('María López', 'maria.lopez@example.com', '$2y$10$eXAMPLEHASHEDPASSWORD456', 2),
('Carlos Gómez', 'carlos.gomez@example.com', '$2y$10$eXAMPLEHASHEDPASSWORD789', 3);

-- Crear tabla logs si no existe
CREATE TABLE IF NOT EXISTS logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    descripcion TEXT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
);

-- Insertar 10 registros en la tabla logs
INSERT INTO logs (user_id, descripcion) VALUES
(1, 'Inicio sesión'),
(1, 'Cerró sesión'),
(2, 'Intentó cambiar su contraseña'),
(2, 'Cambió su rol a Administrador'),
(3, 'Accedió como invitado'),
(3, 'Cerró sesión como invitado'),
(1, 'Actualizó información personal'),
(2, 'Visualizó el panel de administración'),
(3, 'Solicitó cambio de contraseña'),
(1, 'Eliminó una cuenta de usuario');