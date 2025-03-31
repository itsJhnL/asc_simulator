<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["clarificationCode"])) {
    $_SESSION["clarificationCode"] = $_POST["clarificationCode"];
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>
