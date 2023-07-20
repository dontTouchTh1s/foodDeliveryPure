<?php

include(INCLUDES_PATH . "/setting.php");

$type = $state = $name = $price = $description = "";
$pictures = [];
if (isset($_POST['type']) and isset($_POST['state']) and isset($_POST['name'])
    and isset($_POST['price']) and isset($_POST['description']) and isset($_FILES['picture'])) {
    $type = $_POST['type'];
    $state = ($_POST['state']);
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if (!is_numeric($price))
        $priceError = "قیمت محصول به درستی وارد نشده است.";
} else {
    return;
}
$pictureNames = "";
$uploads_path = ASSETS_PATH . '/img/upload/products';
$uploads_url = UPLOAD_URL . '/products';
foreach ($_FILES['picture']['error'] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['picture']["tmp_name"][$key];
        $pName = basename($_FILES['picture']["name"][$key]);
        $pName = str_replace(" ", "-", $pName);
        move_uploaded_file($tmp_name, "$uploads_path/$pName");
        $pictureNames .= "$pName";
    }
}


// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام اتصال به سرور مشکلی پیش آمده است. لظفا بعدا تلاش کنید.";
    return ($mysql->connect_error);
}

$query = "INSERT INTO products (type, state, name, price, description, pictures)
          VALUES ('$type', '$state', '$name', '$price', '$description', '$pictureNames')";
if ($mysql->query($query))
    $error = "محصول با موفقیت اضافه شد";
else $error = "در هنگام افزودن محصول خطایی رخ داده است.";






