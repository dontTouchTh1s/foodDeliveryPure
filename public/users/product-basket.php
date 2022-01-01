<?php
include("__PATH__.php");
Authentication::check_login();
$error = "";
$productBasketListInfo = $mbList = [];
include(USERS_PATH . "/products/product-basket-action.php");
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
include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
?>
<aside>
    <div class="content content-aside">
    </div>
</aside>
<div class="container">
    <div class="content content-product-basket">
        <div class="product-basket-container">
            <?php
            foreach ($productBasketListInfo as $product) {
                include ASSETS_PATH . "/template/product-basket-product.php";
            }

            ?>
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