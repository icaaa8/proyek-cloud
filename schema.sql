CREATE DATABASE IF NOT EXISTS umkm_db;
USE umkm_db;

CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produk (nama_produk, harga, stok) VALUES 
('Kripik Pisang Cokelat', 15000, 20),
('Kopi Bubuk Robusta', 25000, 15);