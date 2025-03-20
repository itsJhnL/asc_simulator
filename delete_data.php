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

if (!isset($data['id'])) {
    die(json_encode(["status" => "error", "message" => "Invalid input data"]));
}

$id = $conn->real_escape_string($data['id']);

$sql = "DELETE FROM dur_pps WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Data deleted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error deleting data: " . $conn->error]);
}

$conn->close();
?>
