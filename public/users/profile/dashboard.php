<?php
include("__PATH__.php");
Authentication::check_login();
$productBasketListInfo = $productBasketList = $mbList = [];
/** @var int $totalPrice */
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
<?php
include(PUBLIC_PATH . '/header.php');
$onFocus = "none";
if (Authorisation::get_roll() >= ROLL_ADMIN)
    include(ASSETS_PATH . "/template/admin-navigation-drawer.php");
else
    if (Authorisation::get_roll() >= ROLL_ADMIN)
        include(ASSETS_PATH . "/template/admin-navigation-drawer.php");
    else
        include(ASSETS_PATH . "/template/user-navigation-drawer.php");
?>
<div class="container container-dashboard">
    <div class="content content-dashboard">
        <div class="dashboard-header">
            <ul>
                <li class="liked-products" aria-selected="true">
                    <span>داشبورد</span>
                    <i class="far fa-heart"></i>
                </li>
                <li class="liked-products">
                    <span>لایک شده ها</span>
                    <i class="far fa-heart"></i>
                </li>
                <li class="liked-products">
                    <span> ذخیره شده ها</span>
                    <i class="far fa-heart"></i>
                </li>
                <li class="liked-products">
                    <span>نظرات</span>
                    <i class="far fa-heart"></i>
                </li>
                <li class="liked-products">
                    <span>آدرس ها</span>
                    <i class="far fa-heart"></i>
                </li>
            </ul>
        </div>
        <div class="dashboard-content">
            <p class="dashboard-title">
                <?= Authentication::get_full_name() ?>
            </p>
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