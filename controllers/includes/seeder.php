<?php

include("setting.php");
include("__PATH__.php");

$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
try {

    $query = "INSERT INTO products (type, name, state, price, description, pictures) VALUES (?, ?, ?, ?, ?, ?)";
    $mysql->query_and_execute($query, [1, 'پیتزا پپرونی', 1, 150000, 'تهیه شده از با کیفیت ترین پپروتی و خمیر. این پیتزا مناسب افراد با سلیقه تند پسند است،از سس چیلی مخصوص هم استفاده شده است.', 'peperoni.jpg']);
    $mysql->query_and_execute($query, [1, 'پیتزا مخصوص', 1, 200000, 'پیتزای مخصوص سرآشپز از بهترین متریال ها و پروتئین ها تهیه شده است و برای تمام سلیقه هاست.', 'special.jpg']);
    $mysql->query_and_execute($query, [1, 'پیتزا مارگاریتا', 1, 190000, 'پیتزای مارگاریتا یک پیتزای اصیل اسپانیایی، با متریالی ساده و خوش طعم.', 'pizza.jpg']);
    $mysql->query_and_execute($query, [1, 'پیتزا آمریکایی', 1, 240000, 'یک پیتزا پرپنیر با استایل آمریکایی، مناسب برای سلیقه ایرانی', 'american.jpg']);
    $mysql->query_and_execute($query, [1, 'پیتزا پپرونی مخصوص', 1, 250000, 'پیتزای پپرونی ویژه با پنیر اضافه و طعمی عالی', 'specialpeperoni.jpg']);

    $query = "INSERT INTO users (name, full_name, email, password, gender, roll)
VALUES (?, ?, ?, ?, ?, ?);";
    $mysql->query_and_execute($query, ['customer', 'test', 'test@testmail.com', 'password', 1, 0]);
    $mysql->query_and_execute($query, ['super admin', '', 'supreradmin@testmail.com', 'password', 1, 20]);
    $mysql->query_and_execute($query, ['admin', 'test', 'admin@testmail.com', 'password', 1, 10]);

    die("SEEDER RUN SUCCESSFULLY");
} catch (mysqli_sql_exception $e) {
    return $e;
}

