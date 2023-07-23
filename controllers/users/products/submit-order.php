<?php
include("__PATH__.php");
include(INCLUDES_PATH . "/setting.php");
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
session_start();
$email = $_SESSION['email'];
$id = $_SESSION['id'];
session_write_close();
if (isset($_POST['email']) and !empty($_POST['email']))
    $email = $_POST['email'];

$query =
    "
SELECT product_id, QTY FROM productsbasket
WHERE user_id = ?
";
try {
    $result = $mysql->query_and_result($query, [$id]);
    if ($result->num_rows > 0) {
        $result = $result->fetch_all();
        $query =
            "
        INSERT INTO orders (user_id, date, email) values (?, ?, ?);
        ";
        $mysql->query_and_execute($query, [$id, date("Y-m-d", time()), $email]);
        $order_id = $mysql->last_insert_id();
        $query =
            "
        INSERT INTO order_products (order_id, product_id, qty) values (?, ?, ?);
        ";
        foreach ($result as $product) {
            $mysql->query_and_execute($query, [$order_id, $product[0], $product[1]]);
        }
        $query =
            "
        DELETE FROM productsbasket where user_id = ?;  
        ";
        $mysql->query_and_execute($query, [$id]);

        Redirect::request(USER_URL . '/successful.php');
    }
} catch (mysqli_sql_exception $e) {

}
