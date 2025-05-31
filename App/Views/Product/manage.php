<?php include_once __DIR__ . '/../Layout/homeheader.php'; ?>

<div class="container mt-5">
    <h2>Danh sách sản phẩm</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productList as $item): ?>
                <tr>
                    <td><?= $item['Id'] ?></td>
                    <td><?= $item['Name'] ?></td>
                    <td><?= $item['Price'] ?></td>
                    <td><img src="<?= $assets . $item['Image'] ?>" width="100"></td>
                    <td>
                        <form action="<?= $baseURL ?>product/delete" method="POST">
                            <input type="hidden" name="Id" value="<?= $item['Id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__ . '/../Layout/homefooter.php'; ?>
