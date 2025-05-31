<?php include_once __DIR__ . '/../Layout/homeheader.php'; ?>

<div class="container mt-5">
    <h2>Thêm sản phẩm</h2>
    <form method="POST" action="<?= $baseURL ?>product/store">
    <div class="mb-3">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Giá</label>
        <input type="text" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Đường dẫn ảnh (image path)</label>
        <input type="text" name="image" class="form-control" placeholder="VD: images/tenanh.jpg" required>
    </div>

    <!-- Thêm Detail -->
    <div class="mb-3">
        <label>Chi tiết</label>
        <input type="text" name="detail" class="form-control">
    </div>
    <div class="mb-3">
        <label>Chi tiết1</label>
        <input type="text" name="detail1" class="form-control">
    </div>
    <div class="mb-3">
        <label>Chi tiết2</label>
        <input type="text" name="detail2" class="form-control">
    </div>
    <div class="mb-3">
        <label>Chi tiết3</label>
        <input type="text" name="detail3" class="form-control">
    </div>
    <div class="mb-3">
        <label>Chi tiết4</label>
        <input type="text" name="detail4" class="form-control">
    </div>

    
    
    <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
</form>

</div>

<?php include_once __DIR__ . '/../Layout/homefooter.php'; ?>
<script src="<?= $base ?>assets/js/script.js"></script>