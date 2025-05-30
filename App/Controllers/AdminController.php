<?php
require_once './App/Model/ProductModel.php';


class AdminController
{
    public function register()
    {
        Session_start();

        $config = require 'config.php';
        $baseURL = $config['baseURL'];
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $internalPassword = $_POST['internal_key'] ?? '';
            $expectedPassword = '123';

            if ($internalPassword === $expectedPassword) {
              
                header("Location: " . $baseURL . "admin/index");
                exit;
            } else {
                $error = "❌ Mật khẩu nội bộ không đúng.";
            }
        }

        include './App/Views/Admin/register.php';
    }

    public function index()
    {
        $productModel = new ProductModel();                 
        $productList = $productModel->getAllProducts(); 

        include './App/Views/Admin/index.php'; 
    }

    public function orders()
    {
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrders();

        include './App/Views/Admin/orders.php';
    }

    public function deleteOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
            $orderModel = new OrderModel();
            $orderModel->deleteOrder($_POST['order_id']);

            $config = require './config.php';
            header("Location: " . $config['baseURL'] . "admin/orders");
            exit;
        }
    }
}
