<?php
    $messageError = "";
    if (isset($_POST['title']) && isset($_POST['fname']) &&
        isset($_POST['email']) && isset($_POST['message'])) {
        $title = $_POST['title'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        //connecting to database
        $mysql = new mysqli("localhost", "root", "5454123", "front");
        if ($mysql -> connect_errno)
            exit("error");

        $query = "INSERT INTO message (title, fname, email, message)
              VALUES ('$title', '$fname', '$email', '$message')";
        if ($mysql -> query($query))
            $messageError = "پیام شما با موفقیت ارسال شد";
        else $messageError = "در هنگام ارسال پیام خطایی رخ داده است.";
    }




