<?php
header("Content-Type: application/json");
include 'database.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode(["status" => "error", "message" => "Invalid ID received", "received" => $data]);
    exit;
}

$id = intval($data['id']);
$sql = "DELETE FROM your_table WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
                            