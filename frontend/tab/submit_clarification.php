<?php
header("Content-Type: application/json");
require_once "db_connection.php"; // Include database connection

// ✅ Check if clarification code is set
if (!isset($_POST["clarificationCode"])) {
    echo json_encode(["success" => false, "message" => "No clarification code selected."]);
    exit;
}

$clarificationCode = $_POST["clarificationCode"];
$claim_id = 1; // Assuming claim_id is fixed for now

try {
    // ✅ Fetch quantity and day supply from `claims` table
    $stmt = $conn->prepare("SELECT quantity, day_supply FROM claims WHERE claim_id = ?");
    $stmt->execute([$claim_id]);
    $claim = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($claim) {
        $day_supply = $claim['day_supply'];
    } else {
        echo json_encode(["success" => false, "message" => "Claim not found."]);
        exit;
    }

    // ✅ Condition 1: Clarification code check
    if ($clarificationCode != "34") {
        echo json_encode(["success" => false, "message" => "❌ ACA Shortcycle drug, please adjust the day supply and qty accordingly."]);
        exit;
    }

    // ✅ Condition 2: Day supply check (must be 14)
    if ($day_supply != 14) {
        echo json_encode(["success" => false, "message" => "❌ ACA Shortcycle drug. Day supply must be set to 14 days."]);
        exit;
    }

    // ✅ If both conditions pass, return success
    echo json_encode(["success" => true, "message" => "✅ Paid Claim"]);
    exit;

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode(["success" => false, "message" => "Database error. Please try again."]);
    exit;
}
?>
