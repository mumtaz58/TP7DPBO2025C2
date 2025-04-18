<?php
require_once 'config/db.php';

class Flower {
    private $db;
    
    public function __construct() {
        $this->db = db::getInstance()->getConnection();
    }
    
    // Get all flowers with supplier name
    public function getAllFlowers() {
        $query = "SELECT f.*, s.name as supplier_name 
                 FROM flowers f 
                 LEFT JOIN suppliers s ON f.supplier_id = s.supplier_id 
                 ORDER BY f.flower_id ASC"; 
                 
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Get flower by ID
    public function getFlowerById($id) {
        $query = "SELECT * FROM flowers WHERE flower_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Create new flower
    public function createFlower($name, $description, $price, $stock, $supplier_id) {
        $query = "INSERT INTO flowers (name, description, price, stock, supplier_id) 
                  VALUES (:name, :description, :price, :stock, :supplier_id)";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':supplier_id', $supplier_id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    // Update flower
    public function updateFlower($id, $name, $description, $price, $stock, $supplier_id) {
        $query = "UPDATE flowers 
                  SET name = :name, description = :description, price = :price, 
                      stock = :stock, supplier_id = :supplier_id 
                  WHERE flower_id = :id";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':supplier_id', $supplier_id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    // Delete flower
    public function deleteFlower($id) {
        $query = "DELETE FROM flowers WHERE flower_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    // Search flowers by name
    public function searchFlowers($keyword) {
        $query = "SELECT f.*, s.name as supplier_name 
                 FROM flowers f 
                 LEFT JOIN suppliers s ON f.supplier_id = s.supplier_id 
                 WHERE f.name LIKE :keyword 
                 ORDER BY f.name";
                 
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>