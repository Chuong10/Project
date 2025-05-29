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
}
