<?php
/* not working: This function for some reason when submitting the clarification code, it end up to "Error No clarification code selected.". But when I hide this function I got paid claim.  */

/* include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt->close();
    $conn->close();
} */

// ✅ Start session only if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database connection
$host = "localhost";
$user = "root"; // Change this to your database user
$pass = ""; // Change this to your database password
$dbname = "clarification"; // Change this to your actual database

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

// Get JSON data from frontend
$data = json_decode(file_get_contents("php://input"), true);
$clarificationCode = $data["clarificationCode"];
$patient = $data["patient"];
$prescriptionNumber = $data["prescriptionNumber"];

// ✅ Store clarification code in session
$_SESSION["clarificationCode"] = $clarificationCode;

// Prepare SQL statement to insert data
$sql = "INSERT INTO clarification_codes (clarification_code, patient, prescription_number) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $clarificationCode, $patient, $prescriptionNumber);

$response = [];
if ($stmt->execute()) {
    $response["success"] = true;
    $response["message"] = "Clarification code saved successfully!";
} else {
    $response["success"] = false;
    $response["message"] = "Failed to save clarification code.";
}

echo json_encode($response);

// Close database connection
$stmt->close();
$conn->close();
?>