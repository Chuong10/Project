<?php
include_once 'Layout/header.php';
?>

<div class="container py-5">
    <h1 class="mb-4">Giỏ hàng</h1>

    <?php if (empty($cartItems)): ?>
        <div class="alert alert-info">
            Giỏ hàng của bạn đang trống. <a href="/Project/shop">Tiếp tục mua sắm</a>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="<?= $item['product']['image'] ?>" alt="<?= $item['product']['name'] ?>" 
                                     class="img-thumbnail" style="width: 80px; margin-right: 15px;">
                                <div>
                                    <h5 class="mb-0"><?= $item['product']['name'] ?></h5>
                                    <small class="text-muted">Mã: <?= $item['product']['id'] ?></small>
                                </div>
                            </div>
                        </td>
                        <td><?= number_format($item['product']['price']) ?> VNĐ</td>
                        <td>
                            <form action="/Project/shop/updateCart" method="POST" class="d-flex align-items-center">
                                <input type="hidden" name="product_id" value="<?= $item['product']['id'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" 
                                       min="1" class="form-control" style="width: 80px;">
                                <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </form>
                        </td>
                        <td><?= number_format($item['subtotal']) ?> VNĐ</td>
                        <td>
                            <form action="/Project/shop/removeFromCart" method="POST">
                                <input type="hidden" name="product_id" value="<?= $item['product']['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td><strong><?= number_format($total) ?> VNĐ</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="/Project/shop" class="shop-button">Tiếp tục mua sắm</a>
            <a href="/Project/shop/checkout" class="shop-button">Thanh toán</a>
        </div>
    <?php endif; ?>
</div>

<?php
include_once 'Layout/footer.php';
?> 