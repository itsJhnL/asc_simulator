<?php
session_start();

$response = ["success" => false, "clarificationCode" => ""];

if (isset($_SESSION["clarificationCode"])) {
    $response["success"] = true;
    $response["clarificationCode"] = $_SESSION["clarificationCode"];
}

echo json_encode($response);
?>
