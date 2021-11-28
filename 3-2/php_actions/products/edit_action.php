<?php
include(INCLUDES_PATH . "/setting.php");
$type = $state = $name = $price = $description = "";
$pictures = [];
$emptyField = false;
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
$uploads_dir = ASSETS_PATH . '/img/upload/products';
foreach ($_FILES['picture']['error'] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['picture']["tmp_name"][$key];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES['picture']["name"][$key]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $pictureNames .= $name . ":";
    }
}

// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام اتصال به سرور مشکلی پیش آمده است. لظفا بعدا تلاش کنید.";
    return ($mysql->connect_error);
}

$query = "UPDATE products
          SET ('$type', '$state', '$name', '$price', '$description', '$pictureNames')
          WHERE ";
if ($mysql->query($query))
    $error = "محصول با موفقیت اضافه شد";
else $error = "در هنگام افزودن محصول خطایی رخ داده است.";






