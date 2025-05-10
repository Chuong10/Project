<?php
require_once __DIR__ . '/../Model/ordermodel.php';
class ordercontroller
{
public function checkout()
   {
        if (session_status() === PHP_SESSION_NONE) {
           session_start();
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

}
?>