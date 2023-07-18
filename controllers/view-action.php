<?php
include(INCLUDES_PATH . "/setting.php");
// Connecting to database
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
try {
    $query = "SELECT * from products";
    $stmt = $mysql->query($query);

    $stmt->execute();
} catch (mysqli_sql_exception $e) {
    return $e;
}
$result = $stmt->get_result();
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