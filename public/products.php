<?php
session_start();
include("__PATH__.php");
$error = "";
$productsList = [];
include(ACTIONS_PATH . "/view-action.php");
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="contact us">
    <meta name="author" content="AliM">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= STYLE_URL . '/style.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_URL . '/components/card.css' ?>">
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ورود</title>
</head>
<body class="layout">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include(PUBLIC_PATH . '/header.php'); ?>

<div class="nav-drawer">
    <p class="title">منو</p>
    <div class="nav-body">
        <section>
            <span class="section-title">صفحات سایت</span>
            <a href="<?= PUBLIC_URL . '/index.php' ?>" title="خانه" class="btn btn-filled-tonal btn-over-width">
                <i class="fas fa-home"></i>
                <span>خانه</span>

            </a>
            <a href="<?= PUBLIC_URL . '/products.php' ?>" title="محصولات" class="btn btn-filled-tonal btn-over-width">
                <i class="fas fa-home"></i>
                <span>محصولات</span>

            </a>
            <a href="" title="" class="btn btn-filled-tonal">
                <i class="fas fa-home"></i>
                <span>اخبار</span>

            </a>
        </section>
        <section>
            <span class="section-title">حساب کاربری</span>
            <a href="<?= USER_URL . '/login.php' ?>" title="" class="btn btn-filled-tonal btn-over-width">
                <i class="fas fa-home"></i>
                <span>ورود</span>
            </a>
            <a href="<?= USER_URL . '/edit-profile.php' ?>" title="" class="btn btn-filled-tonal btn-over-width">
                <i class="fas fa-home"></i>
                <span>ویرایش پروفایل</span>

            </a>
            <a href="" title="" class="btn btn-filled-tonal">
                <i class="fas fa-home"></i>
                <span>خروج</span>
            </a>
        </section>
    </div>
</div>
<aside>
    <div class="content content-aside">
    </div>
</aside>
<div class="container">
    <div class="content content-products">
        <div class="card-container">
            <?php
            foreach ($productsList as $product) {
                $card = new card($product[3], $product[5], "card-filled");
                $card->picture($product[6]);
                $card->button("سفارش دهید");
                $card->add();
            }
            ?>
        </div>
    </div>
</div>

<?php include(PUBLIC_PATH . '/footer.php'); ?>
<script src="<?= JS_URL . '/form_controls.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/ripple_effect.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/form_validate.js' ?>" type="module"></script>
<script src="<?= JS_URL . '/navigation-drawer.js' ?>" type="text/javascript"></script>
</body>
</html>