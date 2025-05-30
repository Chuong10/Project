<?php

$config = require_once './config.php';
require_once './App/Model/UserModel.php';

class UserController
{
    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();

        $config = require './config.php';
        $baseURL = $config['baseURL'];

        header('Location: ' . $baseURL . 'user/login');
        exit;
    }

    public function index()
    {
        include __DIR__ . '/../Views/User/index.php';
    }

    public function register()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $error = '';
        $config = require './config.php';
        $baseURL = $config['baseURL'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'] ?? 'user';
            $internalKey = $_POST['internal_key'] ?? '';

            // Kiểm tra mật khẩu nội bộ nếu đăng ký admin
            if ($role === 'admin') {
                $expectedKey = '123';
                if ($internalKey !== $expectedKey) {
                    $error = "Mật khẩu nội bộ không đúng.";
                    include __DIR__ . '/../Views/User/register.php';
                    return;
                }
            }

            $userModel = new UserModel();
            try {
            $userId = $userModel->createUser($fullname, $username, $password, $role);

            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            $redirect = ($role === 'admin') ? 'admin/index' : 'home/index';
            header("Location: " . $baseURL . $redirect);
            exit;
            }catch (Exception $e) {
                $error = $e->getMessage(); // Tên đăng nhập đã tồn tại
                include __DIR__ . '/../Views/User/register.php';
                return;
            }
        }

        include __DIR__ . '/../Views/User/register.php';
    }

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $error = '';
        $config = require './config.php';
        $baseURL = $config['baseURL'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $pdo = new PDO("mysql:host=localhost;dbname=productdb2", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                $redirect = ($user['role'] === 'admin') ? 'admin/index' : 'home/index';
                header("Location: " . $baseURL . $redirect);
                exit;
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
            }
        }

        include './App/Views/User/login.php';
    }
}
