<?php
$logeIn = "false";
$email = "";
$headerName = "";
session_start();
if (isset($_SESSION['id']) and isset($_SESSION['email'])) {
    $logeIn = "true";
    $id = $_SESSION['id'];
    $headerName = $_SESSION['name'] . " " . $_SESSION['full-name'];
    $email = $_SESSION['email'];
}
session_write_close();
?>
<header login="<?= $logeIn ?>">
    <div class="navigation-controller">
        <div class="background"></div>
        <span>منو</span>
    </div>
    <nav>
        <ul>
            <li>
                <a href="<?= PUBLIC_URL . '/contact.php' ?>"> تماس با ما </a>
            </li>
            <li>
                <a href="/"> بلاگ </a>
            </li>

        </ul>
    </nav>
    <div class="form-group m-1 h-auto flex-50 ">
        <input type="text" class="form-control form-control-input control-outlined round h-2" value=""
               name="name"
               id="search" aria-labelledby="name-placeholder">
        <label class="placeholder" for="search" id="search-placeholder">جست و جو</label>
    </div>

    <div class="user-navigation">
        <?php
        if ($logeIn == "true") {
            echo("
        <a id='product-basket' href=" . USER_URL . "/product-basket.php" . " class='btn btn-outlined'>
        <i class='fas fa-shopping-basket'></i>        
        <span>سبد خرید</span>
        </a>
        ");
        }
        ?>
        <a id="user-name" href="<?= PUBLIC_URL . '/users/edit-profile.php' ?>"
           class="user-register"><?= $headerName ?></a>
        <a id="login" href="<?= PUBLIC_URL . '/users/login.php' ?>" class="user-register">ورود به حساب</a>
        <i class="user-logo" id="user-logo"></i>
        <div class="user-manage" aria-hidden="true" id="user-manage">
            <div class="flex-100">
                <p class="flex-100" id="user-name"><?= $headerName ?></p>
                <p class="flex-100" id="user-email"><?= $email ?></p>
            </div>
            <a href="<?= ACTIONS_URL . '/users/exit-action.php' ?>" class="btn btn-outlined">خروج</a>
        </div>
    </div>
</header>
<script src="<?= JS_URL . '/user-manage-state.js' ?>" type="text/javascript"></script>