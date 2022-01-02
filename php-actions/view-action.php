<?php
include(INCLUDES_PATH . "/setting.php");
// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام اتصال به سرور مشکلی پیش آمده است. لظفا بعدا تلاش کنید.";
    return ($mysql->connect_error);
}

$query = "SELECT * from products";
$result = $mysql->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        $productsList = $result->fetch_all();
    } else {
        $error = "عدم اتصال";
        $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    }
} else {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}