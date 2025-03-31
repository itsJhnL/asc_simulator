<?php
session_start();
unset($_SESSION["clarificationCode"]);

echo json_encode(["success" => true]);
?>
