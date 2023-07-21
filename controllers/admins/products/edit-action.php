<?php
include(INCLUDES_PATH . "/setting.php");
$type = $state = $name = $price = $description = $pictures = "";
$pictures = [];
/** @var int $product_id */


// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام اتصال به سرور مشکلی پیش آمده است. لظفا بعدا تلاش کنید.";
    return ($mysql->connect_error);
}

// Check if user filled inputs and submit
if (isset($_POST['type']) and isset($_POST['state']) and isset($_POST['name'])
    and isset($_POST['price']) and isset($_POST['description']) and isset($_FILES['picture'])) {
    $type = $_POST['type'];
    $state = ($_POST['state']);
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Get uploaded picture
    $pictureNames = "";
    $uploads_dir = ASSETS_PATH . '/img/upload/products';
    $uploads_url = UPLOAD_URL . '/products';
    foreach ($_FILES['picture']['error'] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['picture']["tmp_name"][$key];
            $pName = basename($_FILES['picture']["name"][$key]);
            $pName = str_replace(" ", "-", $pName);
            move_uploaded_file($tmp_name, "$uploads_dir/$pName");
            $pictureNames .= "$pName";
        }
    }
    $basketList = [0, 0, 0, 0,];
    if (!is_numeric($price))
        $priceError = "قیمت محصول به درستی وارد نشده است.";
    else {
        if ($_FILES['picture']['error'][0] === UPLOAD_ERR_NO_FILE) {
            $query = "UPDATE products
          SET type='$type', `state`='$state', name='$name', price='$price', description='$description'
          WHERE id='$product_id'";
        } else {
            $query = "UPDATE products
          SET type='$type', `state`='$state', name='$name', price='$price', description='$description', pictures='$pictureNames'
          WHERE id='$product_id'";
        }
        if ($mysql->query($query)) {
            $error = "محصول با موفقیت بروزرسانی شد.";
            $mbList[] = new message_box(MESSAGEBOX_TYPE_SUCCESS, $error);
        } else {
            $error = "در هنگام ثبت اطلاعات خطایی رخ داده است، لطفا بعدا تلاش کنید.";
            echo($mysql->error);
        }
    }

}
//Get product information from db and show in the form
$query = "SELECT * FROM products WHERE id='$product_id'";
$result = $mysql->query($query);
if ($result) {
    if ($result->num_rows > 0) {
        $row = ($result->fetch_assoc());
        $type = $row['type'];
        $state = $row['state'];
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
        $pictures = $row['pictures'];
    } else {
        $error = "نتیجه ای یافت نشد";
    }
} else {
    $error = "در هنگام دریافت اطلاعات خطایی رخ داده است. لطفا بعدا کنید.";
    echo($mysql->error);
}







