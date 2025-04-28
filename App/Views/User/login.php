<?php
$config = require 'config.php';
$baseURL = $config['baseURL'];
?>

<?php include './App/Views/Layout/homeheader.php'; ?>
<style>
    body {
        background-image: url('<?= $baseURL ?>assets/images/login-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh; /* Chiều cao full màn hình */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        background: rgba(255, 255, 255, 0.85);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        width: 100%;
        max-width: 500px;
    }
</style>

<div class="container mt-5 mb-5" style="max-width: 500px;">
    <h2 class="text-center mb-4">🔐 Đăng nhập</h2>

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

    <div class="text-center mt-3">
        Chưa có tài khoản? <a href="<?= $baseURL ?>user/register">Đăng ký</a>
    </div>
</div>

<?php include './App/Views/Layout/homefooter.php'; ?>
