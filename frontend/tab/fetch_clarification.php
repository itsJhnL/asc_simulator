<?php
include 'db_connection.php';

$prescription_number = "52155823"; // Fetch dynamically if needed

$sql = "SELECT clarification_code FROM clarification_codes WHERE prescription_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $prescription_number);
$stmt->execute();
$stmt->bind_result($clarification_code);
$stmt->fetch();
$stmt->close();
$conn->close();

echo json_encode(["clarification_code" => $clarification_code]);
?>

<!-- Pull this -->