<?php
include_once 'Layout/header.php';
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h1 class="product-title mb-4"><?= $product['name'] ?></h1>
            <div class="product-price mb-4"><?= number_format($product['price']) ?> VNĐ</div>
            <p class="product-description mb-4"><?= $product['description'] ?></p>
            
            <form action="/Project/shop/addToCart" method="POST" class="mb-4">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" style="width: 100px;">
                </div>
                <button type="submit" class="shop-button">Thêm vào giỏ</button>
            </form>

            <div class="product-meta">
                <p><strong>Danh mục:</strong> <?= $product['category'] ?></p>
                <p><strong>Mã sản phẩm:</strong> <?= $product['id'] ?></p>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="related-products mt-5">
        <h2 class="mb-4">Sản phẩm liên quan</h2>
        <div class="product-grid">
            <?php foreach ($relatedProducts as $related): ?>
            <div class="product-card">
                <img src="<?= $related['image'] ?>" alt="<?= $related['name'] ?>" class="product-image">
                <div class="product-info">
                    <h3 class="product-title"><?= $related['name'] ?></h3>
                    <div class="product-price"><?= number_format($related['price']) ?> VNĐ</div>
                    <a href="/Project/shop/product/<?= $related['id'] ?>" class="shop-button">Xem chi tiết</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
include_once 'Layout/footer.php';
?> 