<?php
include(INCLUDES_PATH . "/setting.php");
// Connecting to database
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
$id = Authentication::get_id();
$query = "SELECT product_id from likedproducts WHERE user_id = ?";
$result = $mysql->query_and_result($query, [$id]);
try {
    $likedList = $result->fetch_all();
    $productsList = [];
    foreach ($likedList as $product) {
        $query = "SELECT * from products WHERE  id = '$product[0]'";
        $result = $mysql->query_and_result($query);
        $productsList[] = $result->fetch_array();
    }
} catch (\mysql_xdevapi\Exception $e) {
    $error = "عدم اتصال";
    $errorDes = $e;
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}