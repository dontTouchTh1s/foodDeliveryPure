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
    <link rel="stylesheet" href="<?= STYLE_URL . '/components/swiper.css' ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ارتباط با ما</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include(PUBLIC_PATH . '/header.php');
$onFocus = "خانه";
include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
?>
<div class="container">
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
    <script src="<?= JS_URL . '/javaScriptDynamicLoad.js' ?>" type="text/javascript"></script>
</div>
</body>
</html>