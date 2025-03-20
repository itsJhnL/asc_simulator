<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dur_pps_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id'], $data['reason'], $data['professional'], $data['result'])) {
    die(json_encode(["status" => "error", "message" => "Invalid input data"]));
}

$id = $conn->real_escape_string($data['id']);
$reason = $conn->real_escape_string($data['reason']);
$professional = $conn->real_escape_string($data['professional']);
$result = $conn->real_escape_string($data['result']);

$sql = "UPDATE dur_pps SET reason='$reason', professional='$professional', result='$result' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Data updated successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error updating data: " . $conn->error]);
}

$conn->close();
?>
