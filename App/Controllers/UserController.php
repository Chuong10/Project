<?php

$config = require_once './config.php';
require_once './App/Model/UserModel.php';

class UserController
{
    public function index()
    {
        include __DIR__ . '/../Views/User/index.php';
    }
    public function register()
    {
        if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }

        $error = '';
        
        $config = require './config.php';
        $baseURL = $config['baseURL'];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            //call usermodal to import user
            $userModel = new UserModel();
            
            $userModel ->createUser($fullname, $username, $password);
            
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;

            header("Location: " . $baseURL. 'home/index');
            exit;
        }
        include __DIR__ . '/../Views/User/register.php';
    }
}