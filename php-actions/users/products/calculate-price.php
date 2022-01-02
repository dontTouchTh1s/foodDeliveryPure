<?php
include("__PATH__.php");
header("Content-type: application/json");

//Include data base files
include(INCLUDES_PATH . "/setting.php");
$connectType = isset($_SERVER["CONTENT_TYPE"]);
if ($connectType == "application/json") {
    $data = json_decode(file_get_contents("php://input"), true);
    $resultData = ["totalPrice" => null, "totalDiscountPrice" => null];
    if (isset($data["id"])) {
        $pid = $data['id'];
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

$query = "SELECT total_price FROM productsbasket WHERE user_id = ?";
$sth = $mysql->prepare($query);
$sth->bind_param('ii', $uid, $pid);
$totalPrice = 0;
if ($sth->execute()) {
    $result = $sth->get_result();
    if ($result->num_rows > 0) {
        // We should find something
        $pricesList = $result->fetch_all();

        foreach ($pricesList as $itemPrice) {
            $totalPrice += $itemPrice[0];
        }
    }
    // Return data
    echo json_encode($resultData);
} else {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}





