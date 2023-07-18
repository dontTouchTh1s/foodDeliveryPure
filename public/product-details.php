<?php
session_start();
include("__PATH__.php");
$error = $pid = "";
$product = $mbList = [];
include(ACTIONS_PATH . "/product-details-action.php");
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="contact us">
    <meta name="author" content="AliM">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= STYLE_URL . '/style.css' ?>">
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ورود</title>
</head>
<body class="layout">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include(PUBLIC_PATH . '/header.php');
$onFocus = "none";
if (Authorisation::get_roll() >= ROLL_ADMIN)
    include(ASSETS_PATH . "/template/admin-navigation-drawer.php");
else
    if (Authentication::isLogeIn())
        include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
    else
        include(ASSETS_PATH . "/template/user-navigation-drawer.php");
?>
<aside>
    <div class="content content-aside">
    </div>
</aside>
<div class="container">
    <div class="content content-product-details">
        <div class="product-details-content" product-id="<?= $pid ?>">
            <div class="right-aside">
                <div class="product-picture">
                    <img src="<?= $product['pictures'] ?>" alt="<?= $product['name'] ?>">
                </div>
            </div>
            <div class="product-info">
                <div class="info">
                    <h1 class="title"><?= $product['name'] ?></h1>
                    <p class="details"><?= $product['description'] ?></p>
                    <p class="product-price">
                        <span class="price"><?= $product['price'] ?></span>
                        تومان
                    </p>
                </div>
                <div class="product-actions">
                    <i class="far fa-heart"></i>
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="product-buy">
                    <button type="button" class="btn btn-filled buy-button">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="buy-button-text">افزودن به سبد خرید</span>
                    </button>
                </div>
            </div>
        </div>
        <?php
        foreach ($mbList as $ms)
            $ms->add();
        ?>
    </div>
    <?php include(PUBLIC_PATH . '/footer.php'); ?>
    <script src="<?= JS_URL . '/javaScriptDynamicLoad.js' ?>" type="text/javascript"></script>
</body>
</html>