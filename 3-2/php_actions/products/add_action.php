<?php
$type = $state = $name = $price = $description = $picture = "";
$emptyField = false;
if (isset($_POST['type']) and isset($_POST['state']) and isset($_POST['name']) and isset($_POST['price']) and isset($_POST['description']) ){
    $type = $_POST['type'];
    $state = ($_POST['state']) ;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    if (!is_numeric($price))
        $priceError = "قیمت محصول به درستی وارد نشده است.";
}
else{
    return;
}


//connecting to database
$mysql = new mysqli("localhost", "root", "5454123", "front");
if ($mysql -> connect_errno) {
    $error = "در هنگام ثبت اطلاعات مشکلی پیش آمده لطفا بعدا دوباره تلاش کنید.";
    return;
}

$query = "INSERT INTO products (type, state, name, price, description)
          VALUES ('$type', '$state', '$name', '$price', '$description')";
if ($mysql -> query($query))
    $error = "محصول با موفقیت اضافه شد";
else $error = "در هنگام افزودن محصول خطایی رخ داده است.";






