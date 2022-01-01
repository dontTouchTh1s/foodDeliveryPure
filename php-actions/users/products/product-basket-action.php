<?php

include(INCLUDES_PATH . "/setting.php");

// Connecting to database
$uid = Authentication::get_id();
if (!$uid)
    return;
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    return;
}
$query = "SELECT * FROM productsbasket WHERE user_id = ?";
$sth = $mysql->prepare($query);
$sth->bind_param('i', $uid);
if ($sth->execute()) {
    $result = $sth->get_result();
    if ($result->num_rows > 0) {
        $productBasketList = $result->fetch_all();
        foreach ($productBasketList as $product) {
            $query = "SELECT * FROM products WHERE id = ?";
            $sth = $mysql->prepare($query);
            $sth->bind_param('i', $product[1]);
            $sth->execute();
            $result = $sth->get_result();
            $productBasketListInfo[] = $result->fetch_row();
        }
    } else {
        $error = "عدم اتصال";
        $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
        $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
        return;
    }
} else {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    return;
}

