<?php
// Kết nối CSDL từ file config
require_once 'config.php';

// Lấy ID sản phẩm từ URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // đảm bảo an toàn dữ liệu

    // Truy vấn lấy thông tin sản phẩm
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy sản phẩm.";
        exit;
    }
} else {
    echo "Không có sản phẩm nào được chọn.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Chi tiết sản phẩm</h1>
    <p><strong>Tên:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
    <p><strong>Mô tả:</strong> <?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
    <p><strong>Giá:</strong> <?php echo number_format($product['price'], 0, ',', '.'); ?> VND</p>
    <p><strong>Hình ảnh:</strong></p>
    <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="max-width:300px;">
</body>
</html>
