<?php
//Include data base files
include(INCLUDES_PATH . "/setting.php");

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    return;
}

// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام ثبت اطلاعات مشکلی پیش آمده لطفا بعدا دوباره تلاش کنید.";
    return ($mysql->connect_error);
}

//Get user information from db and show in the form
$query = "SELECT * FROM user_information WHERE id='$id'";
$result = $mysql->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        $row = ($result->fetch_assoc());
        $name = $row['name'];
        $fullName = $row['full-name'];
        $email = $row['email'];
        $gender = $row['gender'];
        $password = $row['password'];
    } else {
        $error = "نتیجه ای یافت نشد";
    }
} else {
    $error = "در هنگام دریافت اطلاعات خطایی رخ داده است. لطفا بعدا کنید.";
    echo($mysql->error);
}

if (isset($_POST['name']) and isset($_POST['full-name']) and isset($_POST['email']) and isset($_POST['password'])) {
    $name = $_POST['name'];
    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!preg_match("/^[\p{L} ]+$/u", $name))
        $nameError = "لطفا یک نام واقعی وارد کنید.";
    if (!preg_match("/^[\p{L} ]+$/u", $name))
        $fullNameError = "لطفا یک نام واقعی وارد کنید.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $emailError = "ایمیل وارد شده نا معتبر است.";
} else {
    return;
}

$query = "UPDATE user_information
          SET name='$name', `full-name`='$fullName', email='$email', password='$password'
          WHERE id='$id'";
if ($mysql->query($query))
    $error = "اطلاعات بروزرسانی شد";
else {
    $error = "در هنگام ثبت اطلاعات خطایی رخ داده است، لطفا بعدا تلاش کنید.";
    echo($mysql->error);
}





