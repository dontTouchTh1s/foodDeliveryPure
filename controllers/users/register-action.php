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
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
$query = "SELECT email FROM users WHERE email = ?";
$stmt = $mysql->query($query, [$email]);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $error = "این ایمیل قبلا ثبت شده است.";
        $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    } else {
        $query = "INSERT INTO users (name, full_name, email, password, gender, roll)
          VALUES ('$name', '$fullName', '$email', '$password', '$gender', 'user')";
        $result = $mysql->query_and_execute($query);
        if ($result) {
            $error = "اکانت با موفقیت ساخته شد.";
            $mbList[] = new message_box(MESSAGEBOX_TYPE_SUCCESS, $error);
        } else {
            $error = "عدم اتصال";
            $errorDes = "در هنگام ثبت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
            $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
            end($mbList)->description($errorDes);
        }
    }
}







