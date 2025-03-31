<?php
session_start();

$response = ["success" => false, "specialPackagingIndicator" => ""];

if (!empty($_SESSION["specialPackagingIndicator"])) {
    $response["success"] = true;
    $response["specialPackagingIndicator"] = $_SESSION["specialPackagingIndicator"];
}

echo json_encode($response);
?>
