<?php

if (isset($_POST['title']) && isset($_POST['fname']) &&
    isset($_POST['email']) && isset($_POST['message'])){
    $title = $_POST['title'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
}
    //connecting to database
    $link =  mysqli_connect("sql205.b6b.ir", "b6bi_30176560", "A)5454123", "b6bi_30176560_DBfrontproject");

    if (mysqli_connect_error())
        exit("error");
?>