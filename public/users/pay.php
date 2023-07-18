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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include(PUBLIC_PATH . '/header.php');
if (Authorisation::get_roll() >= ROLL_ADMIN)
    include(ASSETS_PATH . "/template/admin-navigation-drawer.php");
else
    if (Authentication::isLogeIn())
        include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
    else
        include(ASSETS_PATH . "/template/user-navigation-drawer.php");
?>
<div class="container container-buying">
    <div class="content content-pay">
        <div class="payMethod-content">
            <p>انتخاب روش پرداخت</p>
            <div class="payMethods">
            </div>
        </div>
        <div class="discount-content">
            <p>کد تخفیف</p>
            <p class="address"></p>
            <p>گیرنده:
                <span class="receiver-name"></span>
            </p>
        </div>
    </div>
    <div class="content content-aside">
        <div class="checkout-order">
            <ul class="prices">
                <li>
                    <span>جمع کالا ها:</span>
                    <span><?= $totalPrice ?></span>
                </li>
                <li>
                    <span>جمع سبد خرید:</span>
                    <span><?= $totalPrice ?></span>
                </li>
            </ul>
            <p>هزینه ارسال در ادامه فرایند خرید، بر اساس نحوه ارسال و زمان ارسال محاسبه خواهد شد.</p>
            <button type="button" class="btn btn-filled flex-100 goto_pay">
                ادامه فرایند خرید
            </button>
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