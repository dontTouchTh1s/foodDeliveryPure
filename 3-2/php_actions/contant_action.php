<?php
    $errorMessages = ["لطفا عنوان پیام را مشخص کنید.", "لطفا نام خود را وارد کنید.", "لطفا ایمیل معتبر وارد کنید.", "پیام خود را وارد کنید."];
    $postData = ['title-message','name','email','message'];
    $errors = ["", "", "", ""];
    for ($i = 0; $i<count($postData); $i++)
    {
        if (isset($_POST[$i]))
        {
            $data[$i] = $_POST[$i];
        }
        else
            $errors[$i] = "لطفا این فیلد را پر کنید.";

    }



    $title = $_POST['title-message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!preg_match("/^[\p{L} ]+$/u", $name))
        $nameError = "لطفا یک نام واقعی وارد کنید.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $emailError = "ایمیل نا معتبر است.";

//connecting to database
$mysql = new mysqli("localhost", "root", "5454123", "front");
if ($mysql -> connect_errno)
    exit("error");

$query = "INSERT INTO message (title, name, email, message)
          VALUES ('$title', '$name', '$email', '$message')";
if ($mysql -> query($query))
    $messageError = "پیام شما با موفقیت ارسال شد";
else $messageError = "در هنگام ارسال پیام خطایی رخ داده است.";





