<?php
header("Content-Type: application/json");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dur_pps_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['reason'], $data['professional'], $data['result'])) {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
    exit;
}

// Sanitize inputs
$reason = $conn->real_escape_string($data['reason']);
$professional = $conn->real_escape_string($data['professional']);
$result = $conn->real_escape_string($data['result']);

$sql = "INSERT INTO dur_pps (reason, professional, result) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "SQL error: " . $conn->error]);
    exit;
}

$stmt->bind_param("sss", $reason, $professional, $result);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Data saved successfully", "id" => $conn->insert_id]);
} else {
    echo json_encode(["status" => "error", "message" => "Error saving data: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
