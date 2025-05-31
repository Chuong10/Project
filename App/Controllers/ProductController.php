<?php
require_once __DIR__ . '/../Model/ProductModel.php';
class ProductController
{
    public function index()
    {
        $product = new ProductModel();
        $productList = $product->getAllProducts();
        include __DIR__ . '/../Views/Product/index.php';
    }
    public function create()
    {
        include __DIR__ . '/../Views/Product/create.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] ==='POST' &&
            isset($_POST['Id'])
        )
        {
            $productId = $_POST['Id'];
            $product = new ProductModel();
            $product->deleteProduct($productId);    
            
        }
        // Chuyển hướng về trang admin
        header("Location: ../admin/index");
        exit;
    }

    public function manage()
{
    $product = new ProductModel();
    $productList = $product->getAllProducts();
    include __DIR__ . '/../Views/Product/manage.php';
}


    public function store()
    {
        $name = $_POST['Name'] ?? '';
        $price = $_POST['Price'] ?? 0;
        $image = $_POST['image'] ?? '';
    $detail = $_POST['detail'] ?? '';
    $detail1 = $_POST['detail1'] ?? '';
    $detail2 = $_POST['detail2'] ?? '';
    $detail3 = $_POST['detail3'] ?? '';
    $detail4 = $_POST['detail4'] ?? '';

        // Xử lý upload ảnh
        if (isset($_FILES['Image']) && $_FILES['Image']['error'] == 0) {
            $image = time() . '_' . basename($_FILES['Image']['Name']);
            
            move_uploaded_file($_FILES['Image']['tmp_name'], __DIR__ . '/../uploads/' . $image);
        }

        // Gọi Model để lưu
        $product = new ProductModel();
        $product->insertProduct($name, $price, $image, $detail, $detail1, $detail2, $detail3, $detail4);

        // Chuyển hướng về trang danh sách
        header("Location:index");
        exit;
    }
    

    public function detail($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);

        if (!$product) {
            echo "Sản phẩm không tồn tại.";
            return;
        }

        // Gửi sản phẩm sang view chi tiết
        include './App/Views/Product/detail.php';
    }  
    }
