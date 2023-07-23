<?php
header("Content-type: application/json");
include("__PATH__.php");
include(INCLUDES_PATH . "/setting.php");

// Connecting to database
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
$connectType = isset($_SERVER["CONTENT_TYPE"]);
$orderId = "";
if ($connectType == "application/json") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['id'])) {
        $orderId = $data['id'];
    }
}
$query = "
SELECT op.qty, p.price, p.name FROM orders o
INNER JOIN order_products op on o.id = op.order_id
INNER JOIN products p on op.product_id = p.id
WHERE o.id = '$orderId'
";
$result = $mysql->query_and_result($query);
if ($result->num_rows > 0) {
    $productsList = $result->fetch_all();
    echo(json_encode($productsList));
} else
    echo(json_encode('no result'));
