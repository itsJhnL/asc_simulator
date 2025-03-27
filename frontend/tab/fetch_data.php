<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dur_pps_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}

$sql = "SELECT id, reason, professional, result FROM dur_pps ORDER BY created_at DESC";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$claimPaid = false;
$checkClaim = $conn->query("SELECT * FROM claims_status WHERE status = 'paid'");
if ($checkClaim->num_rows > 0) {
    $claimPaid = true;
}

echo json_encode(["users" => $data, "claimPaid" => $claimPaid]);
$conn->close();
?>
