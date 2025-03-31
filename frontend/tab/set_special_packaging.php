<?php
session_start();
header("Content-Type: application/json");

if (!isset($_POST["specialPackaging"])) {
    echo json_encode(["success" => false, "message" => "No SPI value received."]);
    exit;
}

$_SESSION["specialPackaging"] = $_POST["specialPackaging"];

echo json_encode(["success" => true, "specialPackaging" => $_SESSION["specialPackaging"]]);
?>
