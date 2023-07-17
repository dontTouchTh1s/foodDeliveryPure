<?php
include(INCLUDES_PATH . "/setting.php");

// Connecting to database
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);

$query = "SELECT * FROM products";
$result = $mysql->query_and_result($query);
if ($result->num_rows > 0) {
    $productsList = $result->fetch_all();
} else
    $error = "نتیجه ای یافت نشد";
