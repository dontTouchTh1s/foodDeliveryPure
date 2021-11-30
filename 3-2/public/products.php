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
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ورود</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include(PUBLIC_PATH . '/header.php'); ?>
<div class="container">
    <div class="right-pizza"></div>
    <div class="content">
        <div class="card-container">
            <?php
            foreach ($productsList as $product) {
                if ($product[6] !== null)
                    $imageURL = UPLOAD_URL . "/products/" . $product[6];
                else
                    $imageURL = "";
                echo("<div class='card card-filled'>
                        <div class='card-picture'><img src='$imageURL'></div>
                        <div class='card-body'>
                            <div class='card-title'>" . $product['3'] . "</div>
                            $product[5]
                            <div class='body-surface'></div>
                        </div>
                    </div>                                            
                ");
            }
            ?>
        </div>
    </div>
</div>
<script src="<?= JS_URL . '/form_controls.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/ripple_effect.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/form_validate.js' ?>" type="text/javascript"></script>
</body>
</html>