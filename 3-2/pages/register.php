<?php
$messageError = "";
//include("../php_actions/contant_action.php")
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
    <title>ایجاد حساب کاربری</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class ="right-pizza"></div>
    <div class="content">
        <div class="form-container">
            <h1>ثبت نام</h1>
            <p>برای ایجاد حساب کاربری اطلاعات زیر را تکمیل و ثپس روی تکمه ثبت نام کلیک کنید.</p>
            <form class="form-vertical" method="post" action=<?= $_SERVER["PHP_SELF"]?>>

                <div class="form-group m-1">
                    <input type="text" class="form-control form-control-input control-filled" value="" name="name" id="name" aria-labelledby="name-placeholder">
                    <label class="placeholder" for="name" id ="name-placeholder" >نام</label>
                    <div class ="form-control-border"></div>
                </div>

                <div class="form-group m-1">
                    <input type="text" class="form-control form-control-input control-filled" value="" name="full-name" id="full-name" aria-labelledby="full-name-placeholder">
                    <label class="placeholder" for="full-name" id ="full-name-placeholder" >نام خانادگی</label>
                    <div class ="form-control-border"></div>
                </div>

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