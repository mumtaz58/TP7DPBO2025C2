-- Database creation
CREATE DATABASE IF NOT EXISTS db_flower_shop;
USE db_flower_shop;

-- Create suppliers table
CREATE TABLE IF NOT EXISTS suppliers (
  supplier_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  address VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create flowers table
CREATE TABLE IF NOT EXISTS flowers (
  flower_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  supplier_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id) ON DELETE SET NULL
);

-- Create orders table
CREATE TABLE IF NOT EXISTS orders (
  order_id INT PRIMARY KEY AUTO_INCREMENT,
  flower_id INT,
  customer_name VARCHAR(100) NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  total_price DECIMAL(10,2) NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (flower_id) REFERENCES flowers(flower_id) ON DELETE SET NULL
);

-- Insert sample data for suppliers
INSERT INTO suppliers (name, address, phone, email) VALUES
('Bunga Sejati', 'Jl. Melati No. 15, Bandung', '08123456789', 'info@bungasejati.com'),
('Fresh Flowers', 'Jl. Anggrek No. 45, Jakarta', '08987654321', 'contact@freshflowers.com'),
('Flower Garden', 'Jl. Mawar No. 78, Surabaya', '08765432198', 'order@flowergarden.com');

-- Insert sample data for flowers
INSERT INTO flowers (name, description, price, stock, supplier_id) VALUES
('Mawar Merah', 'Bunga mawar merah segar dan indah', 25000.00, 50, 1),
('Anggrek Putih', 'Anggrek putih yang elegan', 35000.00, 30, 2),
('Tulip Kuning', 'Tulip kuning cerah yang menyegarkan', 30000.00, 25, 3),
('Lily Putih', 'Lily putih dengan aroma harum', 40000.00, 20, 1),
('Krisan Ungu', 'Krisan ungu dengan kelopak penuh', 22000.00, 40, 2);

-- Insert sample data for orders
INSERT INTO orders (flower_id, customer_name, quantity, total_price) VALUES
(1, 'Budi Santoso', 5, 125000.00),
(2, 'Rina Wati', 3, 105000.00),
(3, 'Deni Permana', 2, 60000.00),
(4, 'Siti Rahma', 1, 40000.00);