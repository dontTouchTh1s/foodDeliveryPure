<?php
//Include data base files
include(INCLUDES_PATH . "/setting.php");

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else
    return;

// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام اتصال به سرور مشکلی پیش آمده است. لظفا بعدا تلاش کنید.";
    return ($mysql->connect_error);
}

//Get users information from db and show in the form
$query = "SELECT * FROM users WHERE id='$id'";
$result = $mysql->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        $row = ($result->fetch_assoc());
        $name = $row['name'];
        $fullName = $row['full_name'];
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

// Check if user filled inputs and submit, update table
if (isset($_POST['name']) and isset($_POST['full-name']) and isset($_POST['email']) and isset($_POST['password'])) {
    $name = $_POST['name'];
    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!preg_match("/^[\p{L} ]+$/u", $name))
        $nameError = "لطفا یک نام واقعی وارد کنید.";
    else if (!preg_match("/^[\p{L} ]+$/u", $name))
        $fullNameError = "لطفا یک نام واقعی وارد کنید.";
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $emailError = "ایمیل وارد شده نا معتبر است.";
    else {
        $query = "UPDATE users
          SET name='$name', full_name='$fullName', email='$email', password='$password'
          WHERE id='$id'";
        if ($mysql->query($query))
            $error = "اطلاعات بروزرسانی شد";
        else {
            $error = "در هنگام ثبت اطلاعات خطایی رخ داده است، لطفا بعدا تلاش کنید.";
            echo($mysql->error);
        }
    }
} else {
    return;
}





