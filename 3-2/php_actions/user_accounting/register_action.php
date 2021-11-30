<?php
//Include data base files
include(INCLUDES_PATH . "/setting.php");

// Check for POST data, if they are right insert them to DB
$name = $fullName = $gender = $email = $password = $rePassword = "";
$emptyField = false;
if (isset($_POST['name']) and isset($_POST['full-name']) and isset($_POST['email']) and
    isset($_POST['gender']) and isset($_POST['password']) and isset($_POST['re-password'])) {
    $name = $_POST['name'];
    $fullName = $_POST['full-name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['re-password'];
    if (!preg_match("/^[\p{L} ]+$/u", $name))
        $nameError = "لطفا یک نام واقعی وارد کنید.";
    if (!preg_match("/^[\p{L} ]+$/u", $name))
        $fullNameError = "لطفا یک نام واقعی وارد کنید.";
    if (!is_numeric($gender))
        $genderError = "لطفا یک مقدار معتبر برای جنسیت وارد کنید.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $emailError = "ایمیل وارد شده نا معتبر است.";
    if ($password != $rePassword)
        $passError = "رمز عبور به درستی تکرار نشده است";
} else {
    // If any of POST data is wrong, stop compiling this file and return to form with errors
    return;
}

// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام ثبت اطلاعات مشکلی پیش آمده لطفا بعدا دوباره تلاش کنید.";
    return ($mysql->connect_error);
}

$query = "INSERT INTO user_information (name, `full-name`, email, password, gender)
          VALUES ('$name', '$fullName', '$email', '$password', '$gender')";
if ($mysql->query($query))
    $error = "اکانت شما با موفقت ساخته شد";
else {
    $error = "در هنگام ساخت اکانت خطایی رخ داده است، لطفا بعدا تلاش کنید.";
    echo($mysql->error);
}





