<?php
require_once 'config/db.php';

class Order {
    private $db;
    
    public function __construct() {
        $this->db = db::getInstance()->getConnection();
    }
    
    // Get all orders with flower name
    public function getAllOrders() {
        $query = "SELECT o.*, f.name as flower_name, f.price as flower_price 
                 FROM orders o 
                 LEFT JOIN flowers f ON o.flower_id = f.flower_id 
                 ORDER BY o.order_date DESC";
                 
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Get order by ID
    public function getOrderById($id) {
        $query = "SELECT * FROM orders WHERE order_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Create new order
    public function createOrder($flower_id, $customer_name, $quantity, $total_price) {
        $query = "INSERT INTO orders (flower_id, customer_name, quantity, total_price) 
                  VALUES (:flower_id, :customer_name, :quantity, :total_price)";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':flower_id', $flower_id, PDO::PARAM_INT);
        $stmt->bindParam(':customer_name', $customer_name, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':total_price', $total_price);
        
        return $stmt->execute();
    }
    
    // Update order
    public function updateOrder($id, $flower_id, $customer_name, $quantity, $total_price) {
        $query = "UPDATE orders 
                  SET flower_id = :flower_id, customer_name = :customer_name, 
                      quantity = :quantity, total_price = :total_price 
                  WHERE order_id = :id";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':flower_id', $flower_id, PDO::PARAM_INT);
        $stmt->bindParam(':customer_name', $customer_name, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':total_price', $total_price);
        
        return $stmt->execute();
    }
    
    // Delete order
    public function deleteOrder($id) {
        $query = "DELETE FROM orders WHERE order_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    // Search orders by customer name
    public function searchOrders($keyword) {
        $query = "SELECT o.*, f.name as flower_name, f.price as flower_price 
                 FROM orders o 
                 LEFT JOIN flowers f ON o.flower_id = f.flower_id 
                 WHERE o.customer_name LIKE :keyword 
                 ORDER BY o.order_date DESC";
                 
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>