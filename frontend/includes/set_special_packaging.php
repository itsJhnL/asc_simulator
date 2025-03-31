<?php
session_start();

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["specialPackaging"])) {
    $_SESSION["specialPackaging"] = $_POST["specialPackaging"];
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
}
?>
