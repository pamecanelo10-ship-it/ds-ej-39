-- Script de creación de Base de Datos y Tabla Recetas
-- Base de Datos
CREATE DATABASE IF NOT EXISTS ds-ej-39;
USE ds-ej-39;

-- Tabla Recetas
CREATE TABLE IF NOT EXISTS recetas (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Ingredientes VARCHAR(100) NOT NULL UNIQUE,
    TiempoPreparacion INT NOT NULL,
    Porciones INT NOT NULL,
    Dificultad INT NOT NULL,
    Calorias INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

