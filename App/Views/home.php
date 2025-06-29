<?php
include_once 'Layout/homeheader.php';
?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($productList as $product): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="<?= $assets . $product['Image'] ?>"
                                alt="<?= $product['Name'] ?>" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= $product['Name'] ?></h5>
                                    <div class="product-price"><?= number_format($product['Price'], 3, ',', '.') ?> VNĐ</div>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="<?= $baseURL ?>product/detail/<?= $product['Id'] ?>">Xem chi tiết</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <form method="post" action="<?= $baseURL . 'cart/add' ?>">
                                    <input type="hidden" name="product_id" value="<?= $product['Id'] ?>">
                                    <button class="btn btn-purple btn-sm">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- ... thêm sản phẩm khác bằng PHP hoặc copy block ... -->
            </div>
        </div>
    </section>
<?php
include_once 'Layout/homefooter.php';
?>


    <!-- Bootstrap core JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base ?>assets/js/script.js"></script>


