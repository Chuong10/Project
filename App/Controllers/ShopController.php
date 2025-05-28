<?php
class ShopController {
    private $productModel;
    private $cartModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->cartModel = new Cart();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        require_once 'App/Views/shop.php';
    }

    public function product($id) {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            header('Location: /Project/shop');
            exit;
        }
        require_once 'App/Views/product-detail.php';
    }

    public function category($category) {
        $products = $this->productModel->getProductsByCategory($category);
        require_once 'App/Views/shop.php';
    }

    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $products = $this->productModel->searchProducts($keyword);
        require_once 'App/Views/shop.php';
    }

    public function addToCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? 0;
            $quantity = $_POST['quantity'] ?? 1;
            
            $this->cartModel->addToCart($productId, $quantity);
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function cart() {
        $cartItems = $this->cartModel->getCartItems();
        $total = $this->cartModel->getTotal();
        require_once 'App/Views/cart.php';
    }

    public function updateCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? 0;
            $quantity = $_POST['quantity'] ?? 0;
            
            $this->cartModel->updateQuantity($productId, $quantity);
            
            header('Location: /Project/shop/cart');
            exit;
        }
    }

    public function removeFromCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? 0;
            
            $this->cartModel->removeFromCart($productId);
            
            header('Location: /Project/shop/cart');
            exit;
        }
    }

    public function checkout() {
        if ($this->cartModel->getItemCount() === 0) {
            header('Location: /Project/shop/cart');
            exit;
        }
        
        require_once 'App/Views/checkout.php';
    }
} 