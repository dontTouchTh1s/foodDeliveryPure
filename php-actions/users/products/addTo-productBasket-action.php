<?php
include("__PATH__.php");
header("Content-type: application/json");

//Include data base files
include(INCLUDES_PATH . "/setting.php");

$connectType = isset($_SERVER["CONTENT_TYPE"]);
if ($connectType == "application/json") {
    $data = json_decode(file_get_contents("php://input"), true);
    $resultData = ["value" => null];
    if (isset($data["id"])) {
        $pid = $data['id'];
        $value = null;
        if (isset($data['value']))
            $value = intval($data['value']);
        $uid = Authentication::get_id();
        if (!$uid) {
            $resultData["isLogeIn"] = false;
            echo json_encode($resultData);
            return;
        }
        $resultData["isLogeIn"] = true;
    } else {
        return;
    }
} else
    return;
// Connecting to database
$mysql = new mysqli(HOST, USERNAME, PASSWORD, DB);
if ($mysql->connect_errno) {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    return;
}
$query = "SELECT price FROM products WHERE id = ?";
$sth = $mysql->prepare($query);
$sth->bind_param('i', $pid);
$sth->execute();
$price = $sth->get_result()->fetch_assoc()["price"];
$query = "SELECT * FROM productsbasket WHERE user_id = ? AND product_id = ?";
$sth = $mysql->prepare($query);
$sth->bind_param('ii', $uid, $pid);
$qty = 0;
$newQty = 0;
if ($sth->execute()) {
    $result = $sth->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $qty = $row["QTY"];
        $newQty = $qty;
        // Product added before, so we now will increase, decrease or set 0 QTY
        $newQty += $value;
        $totalPrice = $newQty * $price;
        $query = "UPDATE productsbasket set QTY = '$newQty', total_price = '$totalPrice' WHERE user_id = ? AND product_id = ?";

        // If value = 0, we should remove product from basketList;
        if (($value === 0) or ($newQty === 0)) {
            $query = "DELETE FROM productsBasket WHERE user_id = ? AND product_id = ?";
            $newQty = 0;
        }
    } else {
        // Product is not in productBasket, we will add that
        $newQty = 1;
        $totalPrice = $newQty * $price;
        $query = "INSERT INTO productsbasket (user_id, product_id, QTY, total_price)
        VALUES (?, ?, '$newQty', '$totalPrice')";
    }
    $sth = $mysql->prepare($query);
    $sth->bind_param('ii', $uid, $pid);
    if (!isset($data["select"])) {
        if ($sth->execute())
            $resultData["value"] = $newQty;
    } else {
        $resultData["value"] = $qty;
    }
    $resultData["itemPrice"] = $totalPrice;
    echo json_encode($resultData);
} else {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}