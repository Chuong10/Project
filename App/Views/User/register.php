<?php
$config = require 'config.php';
$baseURL = $config['baseURL'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?= $baseURL ?>assets/css/login.css"> <!-- Liên kết CSS riêng -->
</head>

<div class="login-container"> 
    <h2> Đăng ký tài khoản</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="<?= $baseURL ?>user/register" method="POST">
        <div class="mb-3">
            <label>Họ tên</label>
            <input type="text" name="fullname" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Tên đăng nhập</label>
            <input type="text" name="username" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-success w-100">Đăng ký</button>
    </form>

    <div class="text-center mt-3">
        Đã có tài khoản? <a href="<?= $baseURL ?>user/login">Đăng nhập</a>
    </div>
</div>

<?php include './App/Views/Layout/homeFooter.php'; ?>
