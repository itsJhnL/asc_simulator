<?php
header("Content-Type: application/json");
require_once "db_connection.php";

// Debugging: Print received POST data
error_log(print_r($_POST, true));

$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 30;
$day_supply = isset($_POST['day_supply']) ? intval($_POST['day_supply']) : 30;
$labelQTY = isset($_POST['labelQTY']) ? intval($_POST['labelQTY']) : 30;

if ($quantity === 0 || $day_supply === 0) {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
    exit;
}

try {
    $sql = "UPDATE claims SET quantity = ?, day_supply = ?, labelQTY = ? WHERE claim_id = 1"; // Ensure claim_id exists
    $stmt = $conn->prepare($sql);
    $stmt->execute([$quantity, $day_supply, $labelQTY]);

    echo json_encode(["status" => "success", "message" => "Claim updated successfully"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>