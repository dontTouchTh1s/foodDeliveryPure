<?php
include(INCLUDES_PATH . "/setting.php");


// Connecting to database
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);

$query = "
SELECT o.id, o.email, o.date, CONCAT(u.name, ' ',u.full_name) as `full_name`  FROM orders o
INNER JOIN users u on o.user_id = u.id
";
$result = $mysql->query_and_result($query);
if ($result->num_rows > 0) {
    $productsList = $result->fetch_all();
} else
    $error = "نتیجه ای یافت نشد";
