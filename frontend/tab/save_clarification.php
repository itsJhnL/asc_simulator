<?php
// ✅ Only start session if it is not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header("Content-Type: application/json");

// ✅ Get JSON data from frontend
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["clarificationCode"])) {
    echo json_encode(["success" => false, "message" => "No clarification code provided."]);
    exit;
}

$clarificationCode = $data["clarificationCode"];
$patient = $data["patient"];
$prescriptionNumber = $data["prescriptionNumber"];

// ✅ Store clarification code in session
$_SESSION["clarificationCode"] = $clarificationCode;

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "clarification";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// ✅ Check if the record already exists
$sql_check = "SELECT id FROM clarification_codes WHERE clarification_code = ? AND patient = ? AND prescription_number = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("sss", $clarificationCode, $patient, $prescriptionNumber);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo json_encode(["success" => true, "message" => "Clarification code already saved."]);
    $stmt_check->close();
    $conn->close();
    exit;
}
$stmt_check->close();

// ✅ Insert into database
$sql_insert = "INSERT INTO clarification_codes (clarification_code, patient, prescription_number) VALUES (?, ?, ?)";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("sss", $clarificationCode, $patient, $prescriptionNumber);

if ($stmt_insert->execute()) {
    echo json_encode(["success" => true, "message" => "Clarification code saved successfully!"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to save clarification code: " . $stmt_insert->error]);
}

$stmt_insert->close();
$conn->close();
?>
