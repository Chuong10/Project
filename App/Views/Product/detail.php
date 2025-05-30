<?php include './App/Views/Layout/homeheader.php'; ?>

<link rel="stylesheet" href="<?= $baseURL?>assets/css/detail.css">

<div class="container my-5">
    <h2 class="text-center mb-4"><?= $product['Name'] ?></h2>
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $assets . $product['Image'] ?>" class="img-fluid" alt="<?= $product['Name'] ?>">
        </div>
        <div class="col-md-6">
            <h4><strong>Giá:</strong> <?= number_format($product['Price'], 3, ',', '.') ?> VNĐ</h4>
            <h4><strong>Mã sản phẩm:</strong> <?= $product['Id'] ?></h4>
            <h5><strong>Mô tả sản phẩm:</strong> </h5>
            <h5><?= $product['Detail'] ?> </h5>
            <h5> <?= $product['Detail1'] ?> </h5>
            <h5> <?= $product['Detail2'] ?> </h5>
            <h5> <?= $product['Detail3'] ?> </h5>
            <h5> <?= $product['Detail4'] ?> </h5>

            <form method="post" action="<?= $baseURL ?>cart/add">
                <input type="hidden" name="product_id" value="<?= $product['Id'] ?>">
                <button type="submit" class="btn btn-primary">Thêm vào giỏ</button>
            </form>
        </div>
    </div>
</div>
<script src="<?= $base ?>assets/js/script.js"></script>
<?php include './App/Views/Layout/homefooter.php'; ?>

