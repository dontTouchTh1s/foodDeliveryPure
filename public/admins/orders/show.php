<?php
include("__PATH__.php");
Authorisation::check_roll(ROLL_ADMIN);
$productsList = [];
include(ACTIONS_PATH . "/admins/orders/show.php");
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="contact us">
    <meta name="author" content="AliM">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= STYLE_URL . '/style.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_URL . '/components/data-table.css' ?>">
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>سفارشات</title>
</head>
<body>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container" id="orders">
    <div class="content">
        <p>
            برای مشاهده جزییات هر سفارش روی آن کلیک کنید.
        </p>
        <div class="content-table">
            <div class="table-data">
                <?php
                $tableData = new data_table($productsList);
                $tableData->head(['ردیف', 'ایمیل سفارش', 'تاریخ', 'نام']);
                $tableData->add();
                ?>

            </div>
        </div>
    </div>
    <div class="order-products">
        <div class="order-products-header">
            <div class="item">
                <p>نام محصول</p>
                <p>قیمت</p>
                <p>تعداد</p>
            </div>
        </div>
        <div class="order-products-items">

        </div>
    </div>
</div>
<script src="<?= JS_URL . '/javaScriptDynamicLoad.js' ?>" type="text/javascript"></script>
</body>
</html>