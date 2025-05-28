<?php
class Product {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllProducts() {
        $query = "SELECT * FROM products";
        return $this->db->query($query)->fetchAll();
    }

    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        return $this->db->query($query, ['id' => $id])->fetch();
    }

    public function getProductsByCategory($category) {
        $query = "SELECT * FROM products WHERE category = :category";
        return $this->db->query($query, ['category' => $category])->fetchAll();
    }

    public function searchProducts($keyword) {
        $query = "SELECT * FROM products WHERE name LIKE :keyword OR description LIKE :keyword";
        return $this->db->query($query, ['keyword' => "%$keyword%"])->fetchAll();
    }

    public function addProduct($data) {
        $query = "INSERT INTO products (name, price, description, image, category) 
                 VALUES (:name, :price, :description, :image, :category)";
        return $this->db->query($query, $data);
    }

    public function updateProduct($id, $data) {
        $query = "UPDATE products 
                 SET name = :name, price = :price, description = :description, 
                     image = :image, category = :category 
                 WHERE id = :id";
        $data['id'] = $id;
        return $this->db->query($query, $data);
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = :id";
        return $this->db->query($query, ['id' => $id]);
    }
} 