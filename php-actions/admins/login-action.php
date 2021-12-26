<?php
//Include data base files
include(INCLUDES_PATH . "/setting.php");

if (isset($_POST['email']) and ($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $emailError = "ایمیل وارد شده نا معتبر است.";
} else {
    return;
}

// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام اتصال به سرور مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
}

$query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
$result = $mysql->query($query);
if ($result)
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['full-name'] = $row['full-name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['roll'] = 10;
        redirect::request(USER_URL . "/edit-profile.php");
    } else {
        $error = "نام کاربری یا رمز عبور صحیح نیست.";
        $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    }
else {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}





