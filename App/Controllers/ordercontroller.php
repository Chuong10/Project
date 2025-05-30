<?php
require_once __DIR__ . '/../Model/ordermodel.php';
class ordercontroller
{
public function checkout()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Kiểm tra đăng nhập
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['login_message'] = "Bạn cần phải đăng nhập để mua hàng!";
        $config = require './config.php';
        header("Location: " . $config['baseURL'] . "user/login");
        exit;
    }

    $ordermodel = new OrderModel();
    $productmodel = new ProductModel();

    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $product = $productmodel->getProductById($item['product_id']);
        $total += $product['Price'] * $item['quantity'];
    }

    $orderId = $ordermodel->createOrder($_SESSION['user_id'], $total);
    foreach ($_SESSION['cart'] as $item) {
        $product = $productmodel->getProductById($item['product_id']);
        $ordermodel->addOrderItem($orderId, $item['product_id'], 
                            $item['quantity'], $product['Price']);
    }
    
    unset($_SESSION['cart']);
    include './App/Views/Order/checkout_success.php';
}

   public function history()
   {
       if (session_status() === PHP_SESSION_NONE) {
           session_start();
       }

       if (!isset($_SESSION['user_id'])) {
           $config = require './config.php';
           header("Location: " . $config['baseURL'] . "user/login");
           exit;
       }

       $orderModel = new OrderModel();
       $orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);
       

       $config = require './config.php';
       $baseURL = $config['baseURL'];

       include './App/Views/Order/history.php';
   }

   public function manageOrders()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Kiểm tra admin quyền
    if ($_SESSION['role'] !== 'admin') {
        die("Bạn không có quyền truy cập!");
    }

    $orderModel = new OrderModel();
    $orders = $orderModel->getAllOrders();

    include './App/Views/Admin/index.php'; 
}

public function deleteOrder()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
        $orderId = $_POST['order_id'];

        $orderModel = new OrderModel();
        $orderModel->deleteOrderById($orderId);

        $config = require './config.php';
        header("Location: " . $config['baseURL'] . "order/manageOrders");
        exit;
    }
}


}
?>