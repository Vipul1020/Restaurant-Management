<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['logged_in']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.html");
    exit();
}

// Check if admin_id is set in the session
if (!isset($_SESSION['admin_id'])) {
    die("Admin ID is not set in the session.");
}

$adminId = $_SESSION['admin_id'];

$conn = new mysqli('localhost', 'root', '', 'food_website');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$notifications = 0;
$theme = 'default';

// Fetch current settings from the database
$settings_query = "SELECT notifications, theme FROM admin_settings WHERE admin_id = ?";
$stmt = $conn->prepare($settings_query);
$stmt->bind_param("i", $adminId);
$stmt->execute();
$stmt->bind_result($notifications, $theme);
$stmt->fetch();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="css/styles.css" rel="stylesheet" media="all">
</head>
<body>
    <div>
        <h2>Settings</h2>
        <?php if (isset($message)) echo "<p>$message</p>"; ?>
        <form action="update_settings.php" method="POST">
            <label>Notifications:</label>
            <input type="checkbox" name="notifications" <?php echo ($notifications) ? 'checked' : ''; ?>>
            <label>Theme:</label>
            <select name="theme">
                <option value="default" <?php echo ($theme == 'default') ? 'selected' : ''; ?>>Default</option>
                <option value="dark" <?php echo ($theme == 'dark') ? 'selected' : ''; ?>>Dark</option>
                <option value="light" <?php echo ($theme == 'light') ? 'selected' : ''; ?>>Light</option>
            </select>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
