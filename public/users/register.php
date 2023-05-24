<?php
include("__PATH__.php");
if (Authentication::isLogeIn())
    Redirect::request('profile/dashboard.php');
$nameError = $fullNameError = $genderError = $emailError = $repPasswordError = $passwordError = $error = "";
$mbList = [];
include(ACTIONS_PATH . "/users/register-action.php");
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
    <title>ایجاد حساب کاربری</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include("../header.php");
$onFocus = "ایجاد حساب";
include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
?>
<div class="container">
    <div class="right-pizza"></div>
    <div class="content">
        <div class="form-container form-user">
            <h1 class="flex-100">ثبت نام</h1>
            <p class="flex-100">برای ایجاد حساب کاربری اطلاعات زیر را تکمیل و ثپس روی تکمه ثبت نام کلیک کنید.</p>
            <form class="form-vertical flex-50" method="post" action="<?= $_SERVER["PHP_SELF"] ?>" novalidate>

                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" class="form-control form-control-input control-filled h-2" value="" name="name"
                           id="name" aria-labelledby="name-placeholder" required>
                    <label class="placeholder" for="name" id="name-placeholder">نام</label>
                    <div class="error-message" id="name-error"><?= $nameError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" class="form-control form-control-input control-filled h-2" value=""
                           name="full-name" id="full-name" aria-labelledby="full-name-placeholder" required>
                    <label class="placeholder" for="full-name" id="full-name-placeholder">نام خانادگی</label>
                    <div class="error-message" id="full-name-error"><?= $fullNameError ?></div>
                </div>
                <div class="form-group h-auto m-1 flex-100">
                    <div class="check-group-parent control-filled flex-100">
                        <span class="check-group-label flex-100">جنسیت:</span>
                        <div class="check-group">
                            <label for="non-gender" class="check-label">نامشخص</label>
                            <div class="check-parent h-1">
                                <input type="radio" class="form-control form-control-check" name="gender"
                                       id="non-gender" value="0" checked>
                                <div class="check-background radio">
                                    <i class="far fa-dot-circle"></i>
                                </div>
                                <div class="check-ripple"></div>
                            </div>
                            <label for="male-gender" class="check-label">آقا</label>
                            <div class="check-parent h-1">
                                <input type="radio" class="form-control form-control-check" name="gender"
                                       id="male-gender" value="1">
                                <div class="check-background radio">
                                    <i class="far fa-dot-circle"></i>
                                </div>
                                <div class="check-ripple"></div>
                            </div>
                            <label for="female-gender" class="check-label">خانم</label>
                            <div class="check-parent h-1">
                                <input type="radio" class="form-control form-control-check" name="gender"
                                       id="female-gender" value="2">
                                <div class="check-background radio">
                                    <i class="far fa-dot-circle"></i>
                                </div>
                                <div class="check-ripple"></div>
                            </div>
                        </div>
                    </div>
                    <div class="error-message"><?= $genderError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-100">
                    <input type="email" class="form-control form-control-input control-filled h-2" value="" name="email"
                           id="email" aria-labelledby="email-placeholder" required>
                    <label class="placeholder" for="email" id="email-placeholder">ایمیل</label>
                    <div class="error-message" id="email-error"><?= $emailError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-50">
                    <input type="password" class="form-control form-control-input control-filled h-2" value=""
                           name="password" id="password" aria-labelledby="password-placeholder" required>
                    <label class="placeholder" for="password" id="password-placeholder">رمز عبور</label>
                    <div class="input-icon icon-password" id="icon-password" state="hide">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="error-message" id="password-error"
                         helper-text="حداقل 8 کاراکتر"><?= $passwordError ?></div>
                </div>
                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" class="form-control form-control-input control-filled h-2" value=""
                           name="re-password" id="re-password" aria-labelledby="re-password-placeholder" required>
                    <label class="placeholder" for="re-password" id="re-password-placeholder">تکرار رمز
                        عبور</label>
                    <div class="error-message " id="re-password-error"><?= $repPasswordError ?></div>
                </div>

                <div class="form-group h-2 flex-50">
                    <button type="button" class="btn btn-filled" id="submit-button">ثبت نام</button>
                </div>
                <div class="form-group h-2 flex-50">
                    <a href="login.php" class="btn btn-outlined">
                        ورود
                    </a>
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