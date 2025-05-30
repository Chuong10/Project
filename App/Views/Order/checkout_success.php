<?php include './App/Views/Layout/homeHeader.php'; ?>

<div class="container mt-5 mb-5 text-center bg-color">
    <h2 class="text-muted mb-4"> Đặt hàng thành công!</h2>
    <p>Mã đơn hàng của bạn là: <strong>#<?= $orderId ?></strong></p>
    <a href="<?= $baseURL ?>home/index" class="btn btn-primary mt-3">Quay về trang chủ</a>

</div>
><style>
 .bg-color {
  background-image: url('<?= $assets ?>/images/ronald-van-egdom-undergroundjungle.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;   /* Căn giữa ảnh nền */
  color: #ffffff;
  padding: 2rem;
  border-radius: 16px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
}


</style>

<?php include './App/Views/Layout/homeFooter.php'; ?>