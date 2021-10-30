<?php
    $messageError = "";
    if (isset($_POST['title']) && isset($_POST['fname']) &&
        isset($_POST['email']) && isset($_POST['message'])) {
        $title = $_POST['title'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        //connecting to database
        $link = mysqli_connect("localhost", "root", "5454123", "front");

        if (mysqli_connect_error())
            exit("error");

        $query = "INSERT INTO message (title, fname, email, message)
              VALUES ('$title', '$fname', '$email', '$message')";
        if (mysqli_query($link, $query))
            $messageError = "پیام شما با موفقیت ارسال شد";
        else $messageError = "در هنگام ارسال پیام خطایی رخ داده است.";
    }




