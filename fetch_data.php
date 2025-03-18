<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dur_pps_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]));
}

// Fetch data
$result = $conn->query("SELECT * FROM dur_pps ORDER BY created_at DESC");

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);

$conn->close();
?>

<script>

function loadData() {
    fetch("fetch_data.php")
        .then(response => response.json())
        .then(data => {
            users = data;
            updateTable();
        })
        .catch(error => console.error("Error loading data:", error));
}

// Call this when page loads
document.addEventListener("DOMContentLoaded", loadData);
</script>


?>
