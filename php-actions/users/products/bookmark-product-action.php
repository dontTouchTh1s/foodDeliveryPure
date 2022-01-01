<?php
include("__PATH__.php");
header("Content-type: application/json");

//Include data base files
include(INCLUDES_PATH . "/setting.php");
$connectType = isset($_SERVER["CONTENT_TYPE"]);
if ($connectType == "application/json") {
    $data = json_decode(file_get_contents("php://input"), true);
    $resultData = ["toggled" => null, "isLogeIn" => null];
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

$query = "SELECT * FROM bookmarkedproducts WHERE user_id = ? AND product_id = ?";
$sth = $mysql->prepare($query);
$sth->bind_param('ii', $uid, $pid);

if ($sth->execute()) {
    $result = $sth->get_result();
    if ($result->num_rows > 0) {
        // Product bookmarked before
        $resultData["toggled"] = true;
        $query = "DELETE FROM bookmarkedproducts WHERE user_id = ? AND product_id = ?";
    } else {
        // Product doesn't bookmarked before
        $resultData["toggled"] = false;
        $query = "INSERT INTO bookmarkedproducts (user_id, product_id)
        VALUES (?, ?)";

    }
    // If request is not for selecting data, set new values and execute query
    if (!isset($data["select"])) {
        $sth = $mysql->prepare($query);
        $sth->bind_param('ii', $uid, $pid);
        if ($sth->execute())
            // If executing query success, set new data
            $resultData["toggled"] = !$resultData["toggled"];
    }// If request is for selecting data, or executing query failed, we won't change data
    // Return data
    echo json_encode($resultData);
} else {
    $error = "عدم اتصال";
    $errorDes = "در هنگام دریافت اطلاعات مشکلی پیش آمده است، لطفا بعدا تلاش کنید.";
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}





