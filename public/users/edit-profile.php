<?php
include("__PATH__.php");
Authentication::check_login();
$name = $fullName = $gender = $email = $password = $rePassword = $error = "";
$mbList = [];
include(ACTIONS_PATH . "/users/edit-profile-action.php");
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="contact us">
    <meta name="author" content="AliM">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= STYLE_URL . '/style.css' ?>">
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ویرایش مشخصات</title>
</head>
<body>
<?php
include("../header.php");
$onFocus = "ایجاد حساب";
include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class="right-pizza"></div>
    <div class="content">
        <div class="form-container form-user">
            <h1>ویرایش مشخصات</h1>
            <p>برای ورود، مشخصات اکانت خود را وارد و روی دکمه ورود کلیک کنید.</p>
            <form class="form-vertical" method="post" action="<?= $_SERVER["PHP_SELF"] ?>">

                <div class="form-group m-1 h-auto flex-100">
                    <input type="email" class="form-control form-control-input control-outlined h-2"
                           value="<?= $email ?>" name="email" id="email" aria-labelledby="email-placeholder" required>
                    <label class="placeholder" for="email" id="email-placeholder">ایمیل</label>
                    <div class="error-message" id="email-error"></div>
                </div>

                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" class="form-control form-control-input control-outlined h-2" value="<?= $name ?>"
                           name="name" id="name" aria-labelledby="name-placeholder" required>
                    <label class="placeholder" for="name" id="name-placeholder">نام</label>
                    <div class="error-message" id="name-error"></div>
                </div>

                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" class="form-control form-control-input control-outlined h-2"
                           value="<?= $fullName ?>" name="full-name" id="full-name"
                           aria-labelledby="full-name-placeholder" required>
                    <label class="placeholder" for="full-name" id="full-name-placeholder">نام خانادگی</label>
                    <div class="error-message" id="full-name-error"></div>
                </div>

                <div class="form-group m-1 h-auto flex-100">
                    <input type="password" class="form-control form-control-input control-outlined h-2"
                           value="<?= $password ?>"
                           name="password" id="password" aria-labelledby="password-placeholder" required>
                    <label class="placeholder" for="password" id="password-placeholder">رمز عبور</label>
                    <div class="input-icon icon-password" id="icon-password" state="hide">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </div>
                    <div class="error-message" id="password-error"></div>
                </div>
                <div class="form-group h-auto flex-100 h-2">
                    <button type="button" class="btn btn-filled" id="submit-button">ارسال</button>
                </div>
                <span><?= $error ?></span>
            </form>
        </div>
    </div>
</div>
<?php
foreach ($mbList as $ms)
    $ms->add();
?>
<script src="<?= JS_URL . '/javaScriptDynamicLoad.js' ?>" type="text/javascript"></script>
</body>
</html>