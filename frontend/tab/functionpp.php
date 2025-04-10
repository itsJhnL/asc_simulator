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

file_put_contents("debug.log", print_r($data, true));  // Log received data

if (!empty($data['data'])) {
    foreach ($data['data'] as $entry) {
        $segment = $conn->real_escape_string($entry['segment']);
        $code = $conn->real_escape_string($entry['code']);
        $value = $conn->real_escape_string($entry['value']);

        $sql = "INSERT INTO ecs_submissions (segment, code, value) VALUES ('$segment', '$code', '$value')";

        if (!$conn->query($sql)) {
            echo json_encode(["error" => "SQL Error: " . $conn->error]);
            exit;
        }
    }

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "No data received"]);
}

$conn->close();
?>
