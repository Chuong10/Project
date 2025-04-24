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
        $orderId = $ordermodel->createOrder($_SESSION['user_id'], 0);
        foreach ($_SESSION['cart'] as $item) {
            $product = $productmodel->getProductById($item['product_id']);
            $ordermodel->addOrderItem($orderId, $item['product_id'], 
                                $item['quantity'], $product['Price']);
        }
        
        unset($_SESSION['cart']);
        include './App/Views/Order/checkout_success.php';
   }
}
?>