<?php
include(INCLUDES_PATH . "/setting.php");
// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام اتصال به سرور مشکلی پیش آمده است. لظفا بعدا تلاش کنید.";
    return ($mysql->connect_error);
}
$id = Authentication::get_id();
$query = "SELECT product_id from likedproducts WHERE user_id = '$id'";
$result = $mysql->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        $likedList = $result->fetch_all();
        $productsList = [];
        foreach ($likedList as $product) {
            $query = "SELECT * from products WHERE  id = '$product[0]'";
            $result = $mysql->query($query);
            $productsList[] = $result->fetch_array();
        }

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