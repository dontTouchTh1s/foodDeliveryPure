<?php
include("setting.php");

$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام ثبت اطلاعات مشکلی پیش آمده لطفا بعدا دوباره تلاش کنید.";
    return;
}
$query = "INSERT INTO products (type, name, state, price, description, pictures)
VALUES (1, 'test pizza', 1, 150000, 'test product', 'pizza.jpg')";


if ($mysql->query($query))
    return "SEEDER RUN SUCCESSFULLY";