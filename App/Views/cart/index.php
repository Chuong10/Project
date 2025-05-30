<?php
$config = require 'config.php';
$base = $config['base'];
$baseURL = $config['baseURL'];
$assets = $config['assets'];

include './App/Views/Layout/homeheader.php';
?>

<link rel="stylesheet" href="/Project/assets/css/cart.css">

<!-- Section: Cart -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <h1 class="cart-title text-center">Giỏ hàng của bạn</h1>
        <?php if (empty($cartItems)): ?>
            <div class="alert alert-info text-center">
                Chưa có sản phẩm nào trong giỏ hàng. <a href="<?= $baseURL?>home/index">Tiếp tục mua sắm</a>
            </div>
        <?php else: ?>
            <?php $grandTotal = 0; ?>

            <table class="table table-bordered text-center align-middle cart-table">
                <thead class="table-dark">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): 
                        $total = $item['Price'] * $item['quantity'];
                        $grandTotal += $total;
                    ?>
                        <tr>
                            <td><?= $item['Name'] ?></td>
                            <td><?= number_format($item['Price'], 3) ?> VNĐ</td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= number_format($total, 3) ?> VNĐ</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="table-secondary">
                        <th colspan="3" class="text-end">Tổng cộng:</th>
                        <th><?= number_format($grandTotal, 3) ?> VNĐ</th>
                    </tr>
                </tfoot>
            </table>

            <!-- Nút checkout -->
            <div class="text-end">
                <a href="<?= $baseURL ?>order/checkout" class="btn btn-secondary"> Tiến hành thanh toán</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include './App/Views/Layout/homefooter.php'; ?>
