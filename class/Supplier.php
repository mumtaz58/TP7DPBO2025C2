<?php
require_once 'config/db.php';

class Supplier {
    private $db;
    
    public function __construct() {
        $this->db = db::getInstance()->getConnection();
    }
    
    // Get all suppliers
    public function getAllSuppliers() {
        $query = "SELECT * FROM suppliers ORDER BY name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Get supplier by ID
    public function getSupplierById($id) {
        $query = "SELECT * FROM suppliers WHERE supplier_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Create new supplier
    public function createSupplier($name, $address, $phone, $email) {
        $query = "INSERT INTO suppliers (name, address, phone, email) 
                  VALUES (:name, :address, :phone, :email)";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
    
    // Update supplier
    public function updateSupplier($id, $name, $address, $phone, $email) {
        $query = "UPDATE suppliers 
                  SET name = :name, address = :address, phone = :phone, email = :email 
                  WHERE supplier_id = :id";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
    
    // Delete supplier
    public function deleteSupplier($id) {
        $query = "DELETE FROM suppliers WHERE supplier_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    // Search suppliers by name
    public function searchSuppliers($keyword) {
        $query = "SELECT * FROM suppliers WHERE name LIKE :keyword ORDER BY name";
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>