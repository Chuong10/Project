<?php
include_once 'Layout/header.php';
?>

<div class="shop-header">
    <div class="container">
        <h1 class="shop-title">Terraria Shop</h1>
        <p class="shop-description">Khám phá bộ sưu tập sản phẩm Terraria độc đáo</p>
    </div>
</div>

<div class="container">
    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" class="search-input" placeholder="Tìm kiếm sản phẩm...">
    </div>

    <!-- Categories -->
    <div class="category-list">
        <a href="#" class="category-item active">Tất cả</a>
        <a href="#" class="category-item">Nhân vật</a>
        <a href="#" class="category-item">Vũ khí</a>
        <a href="#" class="category-item">Trang bị</a>
        <a href="#" class="category-item">Phụ kiện</a>
    </div>

    <!-- Product Grid -->
    <div class="product-grid">
        <?php foreach ($products as $product): ?>
        <div class="product-card">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-image">
            <div class="product-info">
                <h3 class="product-title"><?= $product['name'] ?></h3>
                <div class="product-price"><?= number_format($product['price']) ?> VNĐ</div>
                <p class="product-description"><?= $product['description'] ?></p>
                <a href="#" class="shop-button">Thêm vào giỏ</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include_once 'Layout/footer.php';
?> 