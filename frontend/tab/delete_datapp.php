<?php
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$database = "pp";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['code'])) {
    $code = $conn->real_escape_string($data['code']);

    $sql = "DELETE FROM ecs_fields WHERE code = '$code'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Field deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting field: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "No code received"]);
}

$conn->close();
?>
