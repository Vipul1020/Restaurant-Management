<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.html");
    exit();
}

$adminUsername = $_SESSION['username'];
$adminEmail = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Update details in the database
    $conn = new mysqli('localhost', 'root', '', 'food_website');
    $stmt = $conn->prepare("UPDATE admins SET username = ?, email = ?, password = ? WHERE email = ?");
    $stmt->bind_param("ssss", $newUsername, $newEmail, $newPassword, $adminEmail);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    $_SESSION['username'] = $newUsername;
    $_SESSION['email'] = $newEmail;
    
    $adminUsername = $newUsername;
    $adminEmail = $newEmail;
    $message = "Account details updated successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your head content -->
</head>
<body>
    <div>
        <h2>Account Details</h2>
        <?php if (isset($message)) echo "<p>$message</p>"; ?>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $adminUsername; ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $adminEmail; ?>" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
