-- Jalankan lewat phpMyAdmin (tab SQL) atau: mysql -u root < database.sql
CREATE DATABASE IF NOT EXISTS db_latihan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_latihan;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Akun login contoh: username "admin", password "admin123"
INSERT INTO admins (username, password_hash) VALUES
('admin', '$2y$10$rpg6ycXc1JJhsYE/AEg43OTqOBj1IrYOJ4zp46ouocCSthV36Ufeu');

INSERT INTO users (nama, email) VALUES
('Rina Pertiwi', 'rina@contoh.ac.id'),
('Budi Santoso', 'budi@contoh.ac.id'),
('Siti Aminah', 'siti@contoh.ac.id');
