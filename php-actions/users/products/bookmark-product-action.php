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
$mysql = new Mysql(HOST, USERNAME, PASSWORD, DB);
$query = "SELECT * FROM bookmarkedproducts WHERE user_id = ? AND product_id = ?";

try {
    $result = $mysql->query_and_result($query, [$uid, $pid]);
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
        $sth = $mysql->query($query, [$uid, $pid]);
        if ($sth->execute())
            // If executing query success, set new data
            $resultData["toggled"] = !$resultData["toggled"];
    }// If request is for selecting data, or executing query failed, we won't change data
    // Return data
    echo json_encode($resultData);
} catch (Exception $exception) {
    $error = "عدم اتصال";
    $errorDes = $exception;
    $mbList[] = new message_box(MESSAGEBOX_TYPE_ERROR, $error);
    end($mbList)->description($errorDes);
}





