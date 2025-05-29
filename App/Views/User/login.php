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
    <h2> Đăng nhập</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="<?= $baseURL ?>user/login" method="POST">
        <div class="mb-3">
            <label>Tên đăng nhập</label>
            <input type="text" name="username" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
    </form>
         <!-- admin đăng kí -->
    <div class="text-center mt-3">
        Chưa có tài khoản? <a href="<?= $baseURL ?>user/register">Đăng ký</a>
    </div>
    <div class="text-center mt-4">
    <button class="btn btn-outline-secondary" id="toggle-admin">🔑 Đăng ký admin</button>

    <form action="<?= $baseURL ?>admin/register" method="POST" id="admin-form" style="display: none;" class="mt-3">
        <div class="mb-3">
            <label>Mật khẩu nội bộ</label>
            <input type="password" name="internal_key" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-warning w-100">Vào trang quản trị</button>
    </form>

</div>


</div>
<script>
    document.getElementById('toggle-admin').addEventListener('click', function () {
        const form = document.getElementById('admin-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
</script>


<?php include './App/Views/Layout/homefooter.php'; ?>

