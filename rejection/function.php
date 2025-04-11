<?php

header("Content-Type: application/json");


$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !is_array($data)) {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
    exit;
}

foreach ($data as $entry) {
    $reason = $entry['reason'] ?? '';
    $professional = $entry['professional'] ?? '';
    $result = $entry['result'] ?? '';

    if ($reason === "DD"  && $professional === "MO" && $result === "1B") {
        echo json_encode(["status" => "success", "message" => "Claim Successfully Adjudicated"]);
        exit;
    }
}

// If no match, return error
echo json_encode(["status" => "error", "message" => "Invalid DUR Sequence"]);
exit;
?>
