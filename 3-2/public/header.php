<?php
$name = "ورود/ثبت نام";
$email = "";
if (isset($_SESSION['id']) and isset($_SESSION['email'])) {
    $id = $_SESSION['id'];
    $name = $_SESSION['name'] . " " . $_SESSION['full-name'];
    $email = $_SESSION['email'];
}
?>
<header>
    <ul>
        <li>
            <a href="contact.php"> تماس با ما </a>
        </li>
        <li>
            <a href="/"> بلاگ </a>
        </li>
    </ul>
    <a href="<?= PUBLIC_URL . '/user/register_user.php' ?>" class="user-register">
        <span><?= $name ?></span>
    </a>
    <i class="user-logo" id="user-logo"></i>
    <div class="user-manage" aria-hidden="true" id="user-manage">
        <div class="flex-100">
            <p class="flex-100" id="user-name"><?= $name ?></p>
            <p class="flex-100" id="user-email"><?= $email ?></p>
        </div>
        <div class="flex-100">
            <a href="<?= ACTIONS_URL . '/user_accounting/exit_action.php' ?>" class="btn btn-outlined flex-100">خروج</a>
        </div>
    </div>
</header>
<script src="<?= JS_URL . '/user_manage_state.js' ?>" type="text/javascript"></script>