<?php
session_start();
session_unset();  // Xóa toàn bộ session
session_destroy();  // Hủy phiên đăng nhập

// Redirect về trang login
$config = require './config.php'; // nếu config.php nằm cùng cấp, còn không thì sửa đường dẫn
$baseURL = $config['baseURL'];

header('Location: ' . $baseURL . 'user/login');
exit;
?>