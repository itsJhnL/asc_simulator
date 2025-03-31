<?php
session_start();
header("Content-Type: application/json");

echo json_encode([
    "specialPackaging" => $_SESSION["specialPackaging"] ?? "Not Set"
]);
?>
