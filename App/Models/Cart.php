<?php
class Cart {
    private $db;

    public function __construct() {
        $this->db = new Database();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addToCart($productId, $quantity = 1) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
    }

    public function removeFromCart($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    public function updateQuantity($productId, $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$productId] = $quantity;
        } else {
            $this->removeFromCart($productId);
        }
    }

    public function getCartItems() {
        $items = [];
        $productModel = new Product();
        
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $product = $productModel->getProductById($productId);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $product['price'] * $quantity
                ];
            }
        }
        
        return $items;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->getCartItems() as $item) {
            $total += $item['subtotal'];
        }
        return $total;
    }

    public function clearCart() {
        $_SESSION['cart'] = [];
    }

    public function getItemCount() {
        return array_sum($_SESSION['cart']);
    }
} 