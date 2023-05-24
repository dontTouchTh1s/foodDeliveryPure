<?php

include("setting.php");
include("__PATH__.php");

$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
try {

    $query = "INSERT INTO products (type, name, state, price, description, pictures) VALUES (?, ?, ?, ?, ?, ?)";
    $mysql->query($query, [1, 'test pizza', 1, 150000, 'A nice peperoni pizza cooked with love, try it now!', 'pizza.jpg']);

    $query = "INSERT INTO users (name, full_name, email, password, gender)
VALUES (?, ?, ?, ?, ?);";
    $mysql->query($query, ['test', 'test user', 'test@testmail.com', 'password', 1]);
    die("SEEDER RUN SUCCESSFULLY");
} catch (mysqli_sql_exception $e) {
    return $e;
}

