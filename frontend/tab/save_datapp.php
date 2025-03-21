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

if (!empty($data['data'])) {
    foreach ($data['data'] as $entry) {
        $segment = $conn->real_escape_string($entry['segment']);
        $code = $conn->real_escape_string($entry['code']);
        $value = $conn->real_escape_string($entry['value']);

        // Check if record already exists
        $checkQuery = "SELECT * FROM ecs_fields WHERE segment='$segment' AND code='$code'";
        $result = $conn->query($checkQuery);

        if ($result->num_rows > 0) {
         
            $updateQuery = "UPDATE ecs_fields SET value='$value' WHERE segment='$segment' AND code='$code'";
            $conn->query($updateQuery);
        } else {
          
            $insertQuery = "INSERT INTO ecs_fields (segment, code, value) VALUES ('$segment', '$code', '$value')";
            $conn->query($insertQuery);
        }
    }

    echo json_encode(["message" => "Data saved successfully"]);
} else {
    echo json_encode(["error" => "No data received"]);
}

$conn->close();
?>
