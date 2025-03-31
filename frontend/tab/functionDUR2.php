<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !is_array($data)) {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
    exit;
}

$hasDD = false;
$hasTD = false;
$commonProfessional = null;
$commonResult = null;
$validProfessional = false;
$validResult = false;

foreach ($data as $entry) {
    $reason = $entry['reason'] ?? '';
    $professional = $entry['professional'] ?? '';
    $result = $entry['result'] ?? '';

    if ($reason === "DD") {
        $hasDD = true;
    }
    if ($reason === "TD") {
        $hasTD = true;
    }

    if ($commonProfessional === null) {
        $commonProfessional = $professional;
    }
    if ($commonResult === null) {
        $commonResult = $result;
    }

    if ($professional === $commonProfessional) {
        $validProfessional = true;
    } else {
        $validProfessional = false;
        break;
    }

    if ($result === $commonResult) {
        $validResult = true;
    } else {
        $validResult = false;
        break;
    }
}

if ($hasDD && $hasTD && $validProfessional && $validResult) {
    echo json_encode(["status" => "success", "message" => "Claim Successfully Adjudicated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid DUR Sequence"]);
}

exit;
