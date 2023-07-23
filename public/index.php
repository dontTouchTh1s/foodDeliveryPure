<?php
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
    <link rel="stylesheet" href="<?= STYLE_URL . '/components/swiper.css' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>خانه</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include(PUBLIC_PATH . '/header.php');
$onFocus = "خانه";
if (Authorisation::get_roll() >= ROLL_ADMIN)
    include(ASSETS_PATH . "/template/admin-navigation-drawer.php");
else
    if (Authentication::isLogeIn())
        include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
    else
        include(ASSETS_PATH . "/template/user-navigation-drawer.php");
?>
<div class="container">

    <div class="home-content">
        <h1>پیتزای با کیفیت را از ما بخواهید</h1>
        <p class="header-subhead">بهترین متریال</p>
    </div>
    <div class="home-products-content">
        <div class="products-swiper">
            <h3>محصولات</h3>

            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->

                    <?php
                    foreach ($productsList as $product) {
                        echo("<div class='swiper-slide'>");
                        $card = new card(CARD_FILLED, $product[0]);
                        $card->title($product[3]);
                        $card->price($product[4]);
                        $card->description($product[5]);
                        $card->picture($product[6]);
                        $card->buy_button("خرید", 5, CARD_BTN_OUTLINED, "fas fa-shopping-cart");
                        $card->action(CARD_ACTION_LIKE);
                        $card->action(CARD_ACTION_BOOKMARK);
                        $card->add();
                        echo("</div>");
                    }
                    ?>


                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>
    <div class="form-group h-auto flex-100" style="justify-content: center; padding: 20px 0">
        <a href="products.php" type="button" class="btn btn-filled" id="submit-button"
           style="font-size: 25px; height: 50px">مشاهده
            همه محصولات
        </a>
    </div>
    <?php include(PUBLIC_PATH . '/footer.php'); ?>
    <script src="<?= JS_URL . '/javaScriptDynamicLoad.js' ?>" type="text/javascript"></script>
</div>


</body>
</html>