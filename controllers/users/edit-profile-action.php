<?php
//Include data base files
include(INCLUDES_PATH . "/setting.php");

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else
    return;

// Connecting to database
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);

//Get users information from db and show in the form
$query = "SELECT * FROM users WHERE id=?";
$stmt = $mysql->query($query, [$id]);

if ($stmt->execute()) {
    $result = $stmt->get_result();
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
          WHERE id=?";
        if ($mysql->query($query, [$id])) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['full-name'] = $fullName;
            $_SESSION['email'] = $email;
            session_write_close();
            $error = "اطلاعات با موفقیت بروزرسانی شد";
            $mbList[] = new message_box(MESSAGEBOX_TYPE_SUCCESS, $error);
        } else {
            $error = "عدم اتصال";
            $errorDes = "در هنگام ثبت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
            $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
            end($mbList)->description($errorDes);
        }
    }
} else {
    return;
}





