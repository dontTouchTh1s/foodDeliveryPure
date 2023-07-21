<?php
$title = $name = $email = $message = "";
$emptyField = false;
if (isset($_GET['message-title']) and isset($_GET['name']) and isset($_GET['email']) and isset($_GET['message'])) {
    $title = $_GET['message-title'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $message = $_GET['message'];
    if (!is_numeric($title))
        $titleError = "عنوان پیام به درستی انتخاب نشده است.";
    if (!preg_match("/^[\p{L} ]+$/u", $name))
        $nameError = "لطفا یک نام واقعی وارد کنید.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $emailError = "ایمیل وارد شده نا معتبر است.";
} else {
    return;
}


//connecting to database
include(INCLUDES_PATH . "/setting.php");
// Connecting to database
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);

$query = "INSERT INTO message (title, name, email, message)
          VALUES ('$title', '$name', '$email', '$message')";
if ($mysql->query_and_execute($query)) {
    $error = "پیام شما با موفقیت ارسال شد.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_SUCCESS, $error);
} else $error = "در هنگام ارسال پیام خطایی رخ داده است.";





