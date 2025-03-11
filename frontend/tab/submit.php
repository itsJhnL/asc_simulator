<?php
header("Content-Type: application/json");


$data = json_decode(file_get_contents("php://input"), true);


if (!$data || !is_array($data)) {
    echo json_encode(["status" => "error", "message" => "Invalid data format"]);
    exit;
}


foreach ($data as $entry) {
    if (
        strtolower($entry['reason']) !== "td" ||
        strtoupper($entry['professional']) !== "MO" ||
        strtoupper($entry['result']) !== "1B"
    ) {
        echo json_encode(["status" => "error", "message" => "Invalid data: Reason must be 'TD', Professional must be 'MO', and Result must be '1B'"]);
        exit;
    }
}


echo json_encode(["status" => "success", "message" => "Data received successfully"]);
?>
