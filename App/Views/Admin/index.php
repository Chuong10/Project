<?php
include_once __DIR__ . "/../Layout/homeheader.php";


?>

<div class="panel panel-default admin-table-wrapper">
    <div class="panel-heading">Danh sách sản phẩm</div>
    <div class="panel-body">
    
<table class="table table-bordered text-center mt-3">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Người dùng</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order['id'] ?></td>
        <td><?= $order['user_id'] ?></td>
        <td><?= $order['total_amount'] ?> VNĐ</td>
        <td><?= $order['order_date'] ?></td>
        <td>
            <form method="POST" action="<?= $baseURL ?>order/deleteOrder">
                <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                <button type="submit" class="btn btn-danger btn-sm">Xác nhận / Xoá</button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>

    </tbody>
</table>

    </div>
</div>
<div class="text-center mt-5">
    <a href="<?= $baseURL ?>admin/dashboard" class="btn btn-info">
        Xem thống kê doanh thu theo ngày
    </a>
</div>

<?php
include_once __DIR__ . "/../Layout/homefooter.php";
