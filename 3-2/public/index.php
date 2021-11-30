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
    <link rel="stylesheet" href="<?= STYLE_URL . '/header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_URL . '/components/card.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_URL . '/components/swiper.css' ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ارتباط با ما</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include(PUBLIC_PATH . '/header.php'); ?>
<div class="container">
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php
            foreach ($productsList as $product) {
                if ($product[6] !== null)
                    $imageURL = UPLOAD_URL . "/products/" . $product[6];
                else
                    $imageURL = "";
                echo("
                <div class='swiper-slide'>
                    <div class='card card-filled'>
                        <div class='card-picture'><img src='$imageURL'></div>
                        <div class='card-body'>
                            <div class='card-title'>" . $product['3'] . "</div>
                            $product[5]
                            <div class='body-surface'></div>
                        </div>
                    </div>
                    </div>                                            
                ");
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
    <script src="<?= JS_URL . '/swiper.js' ?>" type="text/javascript"></script>
</div>
</body>
</html>