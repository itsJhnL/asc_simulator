<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dur_pps_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]));
}

// Get JSON data
$data = json_decode(file_get_contents("php://input"), true);

// Log request for debugging
file_put_contents("debug_log.txt", json_encode($data, JSON_PRETTY_PRINT));

if (!isset($data['reason'], $data['professional'], $data['result'])) {
    die(json_encode(["status" => "error", "message" => "Invalid input data"]));
}

$reason = $conn->real_escape_string($data['reason']);
$professional = $conn->real_escape_string($data['professional']);
$result = $conn->real_escape_string($data['result']);

$sql = "INSERT INTO dur_pps (reason, professional, result) VALUES ('$reason', '$professional', '$result')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Data saved successfully", "id" => $conn->insert_id]);
} else {
    echo json_encode(["status" => "error", "message" => "Error saving data: " . $conn->error, "sql" => $sql]);
}

$conn->close();
?>
