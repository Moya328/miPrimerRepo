-- Crear base de datos
CREATE DATABASE IF NOT EXISTS miPrimerRepo
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE miPrimerRepo;

-- Tabla de tipos de usuario (roles)
CREATE TABLE tipoUsuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255)
);

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    dni VARCHAR(20) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    tipoUsuario_id INT NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tipoUsuario_id) REFERENCES tipoUsuario(id)
);

-- Insertar roles iniciales
INSERT INTO tipoUsuario (nombre, descripcion) VALUES
('admin', 'Acceso completo al sistema'),
('recepcionista', 'Gestiona turnos y clientes'),
('cliente', 'Accede a sus turnos y perfil');
