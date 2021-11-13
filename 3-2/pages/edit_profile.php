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
    <title>ویرایش مشخصات</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class ="right-pizza"></div>
    <div class="content">
        <div class="form-container">
            <h1>ویرایش مشخصات</h1>
            <p>برای ورود، مشخصات اکانت خود را وارد و روی دکمه ورود کلیک کنید.</p>
            <form class="form-vertical" method="post" action=<?= $_SERVER["PHP_SELF"]?>>

                <div class="form-group m-1">
                    <input type="email" class="form-control form-control-input control-outlined" value="" name="email" id="email" aria-labelledby="email-placeholder">
                    <label class="placeholder" for="email" id ="email-placeholder" >ایمیل</label>
                </div>

                <div class="form-group m-1">
                    <input type="text" class="form-control form-control-input control-outlined" value="" name="name" id="name" aria-labelledby="name-placeholder">
                    <label class="placeholder" for="name" id ="name-placeholder" >نام</label>
                </div>

                <div class="form-group m-1">
                    <input type="text" class="form-control form-control-input control-outlined" value="" name="full-name" id="full-name" aria-labelledby="full-name-placeholder">
                    <label class="placeholder" for="full-name" id ="full-name-placeholder" >نام خانادگی</label>
                    <div class ="form-control-border"></div>
                </div>

                <div class="form-group m-1">
                    <input type="password" class="form-control form-control-input control-outlined" value="" name="password" id=passwordname" aria-labelledby="password-placeholder">
                    <label class="placeholder" for="password" id ="password-placeholder" >رمز عبور</label>
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