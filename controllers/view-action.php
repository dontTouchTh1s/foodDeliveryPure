<?php
include(INCLUDES_PATH . "/setting.php");
$condition = "";
if (isset($_REQUEST['name']) and !empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
    $condition = " WHERE name LIKE '%$name%' ";
}
// Connecting to database
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
try {
    $query = "SELECT * from products" . $condition;
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
        $error = "کالایی برای نمایش وجود ندارد";
        $mbList[] = new message_box(MESSAGEBOX_TYPE_ALERT, $error);
    }
} else {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}