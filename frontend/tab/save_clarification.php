<?php
include 'db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prescription_number = $_POST['prescription_number'];
    $clarification_code = $_POST['clarification_code'];
    $description = $_POST['description'];

    $sql = "INSERT INTO clarification_codes (prescription_number, clarification_code, description) 
            VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $prescription_number, $clarification_code, $description);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>
