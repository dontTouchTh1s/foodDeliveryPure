<?php

include("setting.php");
include("__PATH__.php");

$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
try {

    $query = "INSERT INTO products (type, name, state, price, description, pictures) VALUES (?, ?, ?, ?, ?, ?)";
    $mysql->query_and_execute($query, [1, 'پیتزا پپرونی', 1, 150000, 'پیتزای پپرونی مخصوص سرآشپز تهیه شده از با کیفیت ترین پپروتی و خمیر. این پیتزا مناسب افراد با سلیقه تند پسند است،از سس چیلی مخصوص هم استفاده شده است.', 'pizza.jpg']);
    $mysql->query_and_execute($query, [1, 'پیتزا مخصوص', 1, 200000, 'پیتزای مخصوص سرآشپز از بهترین متریال ها و پروتئین ها تهیه شده است و برای تمام سلیقه هاست.', 'pizza.jpg']);

    $query = "INSERT INTO users (name, full_name, email, password, gender)
VALUES (?, ?, ?, ?, ?);";
    $mysql->query_and_execute($query, ['test', 'test user', 'test@testmail.com', 'password', 1]);

    $query = "INSERT INTO admins (name, full_name, email, password, gender)
VALUES (?, ?, ?, ?, ?);";
    $mysql->query_and_execute($query, ['test', 'test user', 'admin@testmail.com', 'password', 1]);

    die("SEEDER RUN SUCCESSFULLY");
} catch (mysqli_sql_exception $e) {
    return $e;
}

