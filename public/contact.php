<?php
include("__PATH__.php");
$titleError = $nameError = $emailError = $error = "";
$mbList = [];
include("../controllers/contact_action.php");
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
    <title>ارتباط با ما</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include(PUBLIC_PATH . '/header.php');
$onFocus = "none";
if (Authorisation::get_roll() >= ROLL_ADMIN)
    include(ASSETS_PATH . "/template/admin-navigation-drawer.php");
else
    if (Authentication::isLogeIn())
        include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
    else
        include(ASSETS_PATH . "/template/user-navigation-drawer.php");
?>
<div class="container">
    <div class="right-pizza"></div>
    <div class="content">
        <div class="form-container form-user">
            <h1>تماس با ما</h1>
            <p>پس از تکمیل اطلاعات خود، متن پیام خود را نوشته و از دکمه ارسال استفاده کنید.</p>
            <form class="form-vertical" method="get" action=<?= $_SERVER["PHP_SELF"] ?>>

                <div class="form-group m-1 h-auto flex-100">
                    <select class="form-control form-control-select control-filled h-2" value="" name="message-title"
                            id="message-title">
                        <option value="1">شکایات</option>
                        <option value="2">کنترل کیفی</option>
                        <option value="3">انتقادات و پیشنهادات</option>
                    </select>
                    <label class="placeholder" for="message-title">موضوع پیام</label>
                    <div class="error-message"><?= $titleError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" class="form-control form-control-input control-filled h-2" value="" name="name"
                           id="name" aria-labelledby="name-placeholder" required>
                    <label class="placeholder" for="name" id="name-placeholder">نام</label>
                    <div class="error-message" id="name-error"><?= $nameError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-50">
                    <input type="email" class="form-control form-control-input control-filled h-2" value="" name="email"
                           id="email" aria-labelledby="email-placeholder" required>
                    <label class="placeholder" for="email" id="email-placeholder">ایمیل</label>
                    <div class="error-message" id="email-error"><?= $emailError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-100">
                    <textarea class="form-control form-control-textarea control-filled h-auto" value="" name="message"
                              id="message" aria-labelledby="message-placeholder" required></textarea>
                    <label class="placeholder" for="message" id="message-placeholder">متن پیام</label>
                    <span class="textarea-hidden-overflow"></span>
                </div>

                <div class="form-group h-2 flex-100">
                    <button type="button" class="btn btn-filled" id="submit-button">ارسال</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
foreach ($mbList as $ms)
    $ms->add();
?>
<?php include(PUBLIC_PATH . '/footer.php'); ?>

<script src="<?= JS_URL . '/javaScriptDynamicLoad.js' ?>" type="text/javascript"></script>
</body>
</html>