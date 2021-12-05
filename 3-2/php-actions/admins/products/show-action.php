<?php
include(INCLUDES_PATH . "/setting.php");

// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام اتصال به سرور مشکلی پیش آمده است. لظفا بعدا تلاش کنید.";
    return ($mysql->connect_error);
}
$query = "SELECT * FROM products";
$result = $mysql->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        $productsList = $result->fetch_all();
    } else
        $error = "نتیجه ای یافت نشد";
} else $error = "در هنگام دریافت اطلاعات مشکلی پیش آمده است لطفا بعدا تلاش کنید.";
