<?php
$title = $name = $email = $message = "";
$emptyField = false;
if (isset($_GET['message-title']) and isset($_GET['name']) and isset($_GET['email']) and isset($_GET['message']) ){
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
    }
else{
    return;
}


//connecting to database
$mysql = new mysqli("localhost", "root", "5454123", "front");
if ($mysql -> connect_errno) {
    $error = "در هنگام ثبت اطلاعات مشکلی پیش آمده لطفا بعدا دوباره تلاش کنید.";
    return;
}

$query = "INSERT INTO message (title, name, email, message)
          VALUES ('$title', '$name', '$email', '$message')";
if ($mysql -> query($query))
    $error = "پیام شما با موفقیت ارسال شد";
else $error = "در هنگام ارسال پیام خطایی رخ داده است.";





