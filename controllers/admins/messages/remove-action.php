<?php
include("__PATH__.php");
include(INCLUDES_PATH . "/setting.php");
if (isset($_GET["id"])) {
    $pid = $_GET["id"];
} else
    return;
// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "عدم اتصال";
    $errorDes = "در هنگام اتصال به سرور مشکلی پیش آمده است. لظفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$sth = "DELETE FROM message
        WHERE id = ?";
$sth = $mysql->prepare($sth);
$sth->bind_param("i", $pid);
if ($sth->execute()) {
    $error = "محصول با موفقیت اضافه شد";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_SUCCESS, $error);
} else {
    $error = "خطا در هنگام افزودن محصول";
    $errorDes = "در هنگام افزودن محصول خطایی رخ داده است.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;