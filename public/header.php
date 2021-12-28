<?php
$logeIn = "false";
$email = "";
$name = "";
if (isset($_SESSION['id']) and isset($_SESSION['email'])) {
    $logeIn = "true";
    $id = $_SESSION['id'];
    $name = $_SESSION['name'] . " " . $_SESSION['full-name'];
    $email = $_SESSION['email'];
}
?>
<header login="<?= $logeIn ?>">
    <div class="navigation-controller">
        <div class="background"></div>
        <span>منو</span>
    </div>
    <nav>
        <ul>
            <li>
                <a href="contact.php"> تماس با ما </a>
            </li>
            <li>
                <a href="/"> بلاگ </a>
            </li>

        </ul>
    </nav>
    <div class="user-navigation">
        <?php
        if ($logeIn == "true") {
            echo("
        <a id='product-basket' href='' class='btn btn-outlined'>        
        <span>سبد خرید</span>
        <i class='fas fa-shopping-basket'></i>
        </a>
        ");
        }
        ?>
        <a id="user-name" href="<?= PUBLIC_URL . '/users/edit-profile.php' ?>" class="user-register"><?= $name ?></a>
        <a id="login" href="<?= PUBLIC_URL . '/users/login.php' ?>" class="user-register">ورود به حساب</a>
        <i class="user-logo" id="user-logo"></i>
        <div class="user-manage" aria-hidden="true" id="user-manage">
            <div class="flex-100">
                <p class="flex-100" id="user-name"><?= $name ?></p>
                <p class="flex-100" id="user-email"><?= $email ?></p>
            </div>
            <div class="flex-100">
                <a href="<?= ACTIONS_URL . '/users/exit-action.php' ?>" class="btn btn-outlined flex-100">خروج</a>
            </div>
        </div>
    </div>
</header>
<script src="<?= JS_URL . '/user-manage-state.js' ?>" type="text/javascript"></script>