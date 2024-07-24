<?php
session_start();

header('Content-Type: application/json');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo json_encode(['username' => $username]);
} else {
    echo json_encode(['username' => null]);
}
?>
