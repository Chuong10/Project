<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$config = require 'config.php';
$base = $config['base'];
$baseURL = $config['baseURL'];
$assets = $config['assets'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Terraria Shop</title>
    <style>
        header {
  background-image: url('"C:\Users\Admin\OneDrive\Pictures\Saved Pictures\tumblr_n7lcn1fcsl1sdqpmho1_1280.jpg"');
  background-size: cover;
  background-position: center;
}
    </style>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= $base ?>/assets/assets/favicon.ico" />

    <!-- Bootstrap icons-->
    <link href="C:/xampp/htdocs/Project/assets/assets/favicon.ico" rel="stylesheet" />

    <!-- Core theme CSS -->
    <link href="<?= $base ?>assets/css/styles.css" rel="stylesheet" />
</head>

<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#">Terraria Products</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= $baseURL?>/home/index">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#">New Arrivals</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            </ul>

            <!-- Login/Logout -->
            <div class="d-flex align-items-center">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a class="btn btn-outline-primary me-2" href="<?= $baseURL ?>user/logout">Logout</a>
                <?php else: ?>
                    <a class="btn btn-outline-primary me-2" href="<?= $baseURL ?>user/login">Login</a>
                <?php endif; ?>

                <!-- Cart Button -->
                <form method="post" action="<?= $baseURL . 'cart/index' ?>" class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?= array_sum(array_column($_SESSION['cart'] ?? [], 'quantity')) ?>
                        </span>
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>


    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop For Terraria Wolrd</h1>
                <p class="lead fw-normal text-white-50 mb-0">With This Origin Terraria</p>
            </div>
        </div>
    </header>