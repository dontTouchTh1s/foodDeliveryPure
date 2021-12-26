<?php
session_start();
include("__PATH__.php");
$emailError = $error = $errorDes = "";
$mbList = [];
global $mbList;
include(ACTIONS_PATH . "/users/login-action.php");
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
    <title>ورود</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include("../header.php"); ?>
<div class="container">

    <div class="right-pizza"></div>
    <div class="content">
        <div class="form-container form-user">
            <h1>ورود</h1>
            <p>برای ورود، مشخصات اکانت خود را وارد و روی دکمه ورود کلیک کنید.</p>
            <form class="form-vertical" method="post" action="<?= $_SERVER["PHP_SELF"] ?>" novalidate>
                <div class="form-group m-1 h-auto flex-100">
                    <input type="email" class="form-control form-control-input control-filled h-2" value="" name="email"
                           id="email" aria-labelledby="email-placeholder" required>
                    <label class="placeholder" for="email" id="email-placeholder">ایمیل</label>
                    <div class="error-message flex-100" id="email-error"><?= $emailError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-100">
                    <input type="password" class="form-control form-control-input control-filled h-2" value=""
                           name="password" id="password" aria-labelledby="password-placeholder" required>
                    <label class="placeholder" for="password" id="password-placeholder">رمز عبور</label>
                    <div class="input-icon icon-password" id="icon-password" state="hide">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="error-message flex-100" id="password-error"></div>
                </div>


                <div class="form-group h-auto flex-100">
                    <label for="remember-me" class="check-label">مرا به خاطر داشته باش</label>
                    <div class="check-parent h-1">
                        <input id="remember-me" type="checkbox" class="form-control form-control-check">
                        <div class="check-background checkbox">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="check-ripple"></div>
                    </div>
                </div>

                <div class="form-group h-2 flex-100">
                    <button type="button" class="btn btn-filled" id="submit-button"><span>ورود</span></button>
                </div>
            </form>
        </div>

        <?php
        foreach ($mbList as $ms)
            $ms->add();
        ?>

    </div>
</div>
<script src="<?= JS_URL . '/javaScriptDynamicLoad.js' ?>" type="text/javascript"></script>
</body>
</html>
