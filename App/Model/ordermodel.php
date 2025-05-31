<?php
require_once __DIR__ . '/../../Core/database.php';
class ordermodel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    // public function getAllOrders()
    // {
    //     $stmt = $this->db->prepare("SELECT * FROM orders ORDER BY id ASC");
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function createOrder($userId, $totalAmount)
    {
        $sql = "INSERT INTO orders (user_id, total_amount, status) VALUES (?, ?, 'Đặt hàng')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $totalAmount]);
        return $this->db->lastInsertId();
    }

    public function addOrderItem($orderId, $productId, $quantity, $price)
    {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$orderId, $productId, $quantity, $price]);
    }

    public function getOrdersByUserId($userId)
    {
    $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteOrder($orderId)
    {
        $stmt = $this->db->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->execute([$orderId]);
    }

    public function deleteOrderById($id)
{
    // Xóa các item liên quan trước
    $stmt = $this->db->prepare("DELETE FROM order_items WHERE order_id = ?");
    $stmt->execute([$id]);

    // Sau đó mới xóa order
    $stmt = $this->db->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->execute([$id]);
}

public function getAllOrders()
{
    $stmt = $this->db->prepare("SELECT id, user_id, total_amount, order_date FROM orders ORDER BY id DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getRevenueByDate()
{
    $sql = "SELECT DATE(order_date) as order_date, SUM(total_amount) as total_revenue
            FROM orders
            GROUP BY DATE(order_date)
            ORDER BY order_date DESC";
            
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

   
}
    