<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $day_supply = $_POST['day_supply'] ?? 0;
    $quantity = $_POST['quantity'] ?? 0;
    $clarification_code = $_POST['clarification_code'] ?? '';


    $day_supply = is_numeric($day_supply) ? (int) $day_supply : 0;
    $quantity = is_numeric($quantity) ? (int) $quantity : 0;


    if ($day_supply === 14 && $quantity === 14 && $clarification_code === "34") {
        echo json_encode(["status" => "success", "message" => "Paid Claim"]);
        exit;
    }


    echo json_encode(["status" => "error", "message" => "ACA Shortcycle Drug"]);
    exit;
} else {
    echo json_encode(["status" => "error", "message" => "Invalid Request"]);
    exit;
}
?>