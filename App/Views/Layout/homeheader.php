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


    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= $base ?>/assets/assets/favicon.ico" />

    <!-- Bootstrap icons-->
    <link href="<?= $base ?>assets/assets/favicon.ico" rel="stylesheet" />

    <!-- Core theme CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="<?= $base ?>assets/css/stylehomeheader.css" rel="stylesheet" />
    <link href="<?= $base ?>assets/css/stylehome.css" rel="stylesheet" />
    <link href="<?= $base ?>assets/css/stylehomefooter.css" rel="stylesheet" />
    <link href="<?= $base ?>assets/css/styleadminindex.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Fredoka:700&display=swap" rel="stylesheet">

    <link href="<?= $base ?>assets/css/stylecartindex.css" rel="stylesheet" />
<style>
    .rainbow-button {
  background: linear-gradient(
    270deg,
    #ff416c,
    #ff4b2b,
    #fffc00,
    #00ff87,
    #007cf0,
    #7928ca,
    #ff416c
  );
  background-size: 400% 400%;
  color: white;
  border: none;
  border-radius: 10px;
  padding: 8px 20px;
  font-weight: bold;
  animation: rainbowAnim 6s ease infinite;
  transition: transform 0.3s ease;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
  margin-right: 10px;
  text-decoration: none;
}

.rainbow-button:hover {
  transform: scale(1.05);
  box-shadow: 0 0 12px white;
}

@keyframes rainbowAnim {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
</style>
</head>

<body>
    
<!-- Navigation-->
<nav class="navbar navbar-expand-lg BGnavbar">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#">Terraria Products</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= $baseURL?>/home/index">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="#">About</a></li>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">All Products</a></li>
                        <li><a class="dropdown-item" href="#">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#">New Arrivals</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            </ul>

            <!-- Login/Logout -->
            <div class="d-flex align-items-center">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a class="rainbow-button" href="<?= $baseURL ?>user/logout">Logout</a>
                <?php else: ?>
                    <a class="rainbow-button" href="<?= $baseURL ?>user/login">Login</a>
                <?php endif; ?>

                <!-- Cart Button -->
                <form method="post" action="<?= $baseURL . 'cart/index' ?>" class="d-flex">
                    <button class="rainbow-button" type="submit">
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
    <header class="custom-header py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop For Terraria Wolrd</h1>
                <p class="lead fw-normal mb-0" style="color:rgb(255, 255, 255);">With This Origin Terraria</p>
            </div>
        </div>
    </header>