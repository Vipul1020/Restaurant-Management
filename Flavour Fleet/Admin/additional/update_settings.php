<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.html");
    exit();
}

$adminId = $_SESSION['admin_id'];
$conn = new mysqli('localhost', 'root', '', 'food_website');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notifications = isset($_POST['notifications']) ? 1 : 0;
    $theme = $_POST['theme'];

    $stmt = $conn->prepare("UPDATE admin_settings SET notifications = ?, theme = ? WHERE admin_id = ?");
    $stmt->bind_param("isi", $notifications, $theme, $adminId);
    $stmt->execute();
    $stmt->close();

    $_SESSION['theme'] = $theme; // Update session variable to reflect new theme
    $message = "Settings updated successfully!";
}

$conn->close();

// Redirect back to settings page with a success message
header("Location: settings.php");
exit();
