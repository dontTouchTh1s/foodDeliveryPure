<?php
$messageError = "";
include("../php/contact_process.php")
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
    <title>ارتباط با ما</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class = "right-pizza"></div>
    <div class="content">
        <div class="form-container">
            <h1>تماس با ما</h1>
            <p>پس از تکمیل اطلاعات خود، متن پیام خود را نوشته و از دکمه ارسال استفاده کنید.</p>
            <form class="form-vertical" method="post" action=<?= $_SERVER["PHP_SELF"]?>>
                <div class="form-group m-1">
                    <select class="form-control form-control-select" selected-value="xcvxcv" name="title" id="title">
                        <option style="display: none" value="" selected></option>
                        <option value="1">شکایات</option>
                        <option value="2">کنترل کیفی</option>
                        <option value="3">انتقادات و پیشنهادات</option>
                    </select>
                    <label class="select-placeholder" for="title">موضوع پیام</label>
                    <div class ="form-control-border"></div>
                </div>
                <div class="form-group m-1">
                    <input type="text" class="form-control form-control-input" value="" name = "fname" id="fname" aria-labelledby="placeholder-fname">
                    <label class="placeholder" for="fname" id ="placeholder-fname" >نام</label>
                    <div class ="form-control-border"></div>
                </div>
                <div class="form-group m-1">
                    <input type="text" class="form-control form-control-input" value="" name = "fname" id="fname" aria-labelledby="placeholder-fname">
                    <label class="placeholder" for="fname" id ="placeholder-fname" >نام</label>
                    <div class ="form-control-border"></div>
                </div>
                <div class="form-group m-1">
                    <input type="text" class="form-control form-control-input" value="" name = "fname" id="fname" aria-labelledby="placeholder-fname">
                    <label class="placeholder" for="fname" id ="placeholder-fname" >نام</label>
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
</body>
<script src="../js/form_controls.js" type="text/javascript"></script>
<script src="../js/ripple_effect.js" type="text/javascript"></script>
</html>