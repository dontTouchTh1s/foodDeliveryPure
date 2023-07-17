<?php
include("__PATH__.php");
Authentication::check_login();
$productBasketListInfo = $productBasketList = $mbList = [];
/** @var array $productsList */
include(USERS_PATH . "/products/dashboard/liked-products-action.php");
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
                    <a href="dashboard.php">داشبورد</a>
                    <i class="far fa-heart"></i>
                </li>
                <li class="liked-products">
                    <a href="liked-products.php">لایک شده ها</a>
                    <i class="far fa-heart"></i>
                </li>
                <li class="liked-products">
                    <a href="bookmarked-products.php"> ذخیره شده ها</a>
                    <i class="far fa-heart"></i>
                </li>
                <li class="liked-products">
                    <a href="comments.php">نظرات</a>
                    <i class="far fa-heart"></i>
                </li>
                <li class="liked-products">
                    <a href="address.php">آدرس ها</a>
                    <i class="far fa-heart"></i>
                </li>
            </ul>
        </div>
        <div class="dashboard-content">
            <p class="dashboard-title">
                غذا های لایک شده
            </p>
            <div class="card-container">
                <?php
                foreach ($productsList as $product) {
                    $card = new card(CARD_FILLED, $product[0]);
                    $card->title($product[3]);
                    $card->price($product[4]);
                    $card->description($product[5]);
                    $card->picture($product[6]);
                    $card->buy_button("خرید", 5, CARD_BTN_OUTLINED, "fas fa-shopping-cart");
                    $card->action(CARD_ACTION_LIKE);
                    $card->action(CARD_ACTION_BOOKMARK);
                    $card->add();
                }
                ?>
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