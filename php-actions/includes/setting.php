<?php
const HOST = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DB = "front";


$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "در هنگام ثبت اطلاعات مشکلی پیش آمده لطفا بعدا دوباره تلاش کنید.";
    return;
}
$query = "
CREATE TABLE IF NOT EXISTS message (
    id INT AUTO_INCREMENT,
 title VARCHAR(255),
  name VARCHAR(255),
   email VARCHAR(255),
    message VARCHAR(255),
    PRIMARY KEY (id)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT,
     type INT,
      state INT,
      name VARCHAR(255),
       price VARCHAR(255),
        description TEXT,
         pictures TEXT,
        PRIMARY KEY (id)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
     full_name VARCHAR(255),
      email VARCHAR(255),
       password VARCHAR(20),
        gender VARCHAR(10),
        PRIMARY KEY (id)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS productsbasket (
    id INT AUTO_INCREMENT,
    user_id INT,
     product_id INT,
      QTY INT,
       total_price VARCHAR(255),
       PRIMARY KEY (id)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS likedproducts (
    user_id INT,
    product_id INT) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS bookmarkedproducts (
    user_id INT,
     product_id INT);";

if (!$mysql->multi_query($query))
    return "CREATING TABLE FAILED!";

