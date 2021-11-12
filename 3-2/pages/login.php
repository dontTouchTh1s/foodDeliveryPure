<?php
$messageError = "";
include("../php_actions/contact_process.php")
?>
<!DOCTYPE html>
<html lang = "fa">
<head>
    <meta charset = "UTF-8">
    <meta name="description" content="contact us">
    <meta name="author" content="AliM">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/style.css">
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ورود</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class ="right-pizza"></div>
    <div class="content">
        <div class="form-container">
            <h1>ورود</h1>
            <p>برای ورود، مشخصات اکانت خود را وارد و روی دکمه ورود کلیک کنید.</p>
            <form class="form-vertical" method="post" action=<?= $_SERVER["PHP_SELF"]?>>

            <div class="form-group m-1">
                <input type="email" class="form-control form-control-input control-filled" value="" name="email" id="email" aria-labelledby="email-placeholder">
                <label class="placeholder" for="email" id ="email-placeholder" >ایمیل</label>
                <div class ="form-control-border"></div>
            </div>

            <div class="form-group m-1">
                <input type="password" class="form-control form-control-input control-filled" value="" name="password" id=passwordname" aria-labelledby="password-placeholder">
                <label class="placeholder" for="password" id ="password-placeholder" >رمز عبور</label>
                <div class ="form-control-border"></div>
            </div>


            <div class="form-group h-1">
                <label for="remember-me" class="checkbox-label">مرا به خاطر داشته باش</label>
                <div class="checkbox-parent">
                    <input id="remember-me" type="checkbox" class ="form-control form-control-checkbox" >
                    <div class="checkbox-background">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="checkbox-ripple"></div>
                </div>
            </div>

            <div class="form-group h-auto">
                <button type="submit" class="btn btn-filled">ارسال</button>
            </div>
            <span><?= $messageError ?></span>
            </form>
        </div>
    </div>
</div>
<script src="../js/form_controls.js" type="text/javascript"></script>
<script src="../js/ripple_effect.js" type="text/javascript"></script>
</body>
</html>