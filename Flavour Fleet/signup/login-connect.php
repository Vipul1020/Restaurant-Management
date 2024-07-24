<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernameOrEmail = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['user_type']; // Hidden field to determine user type (user/admin)

    $conn = new mysqli('localhost', 'root', '', 'food_website');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Determine the table to query based on user type
    $table = ($userType === 'admin') ? 'admins' : 'users';

    $stmt = $conn->prepare("SELECT id, username, email, password FROM $table WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($adminId, $dbUsername, $dbEmail, $dbPassword);
        $stmt->fetch();
        
        if (password_verify($password, $dbPassword)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $dbUsername;
            $_SESSION['email'] = $dbEmail;
            $_SESSION['user_type'] = $userType; // Store user type in session
            if ($userType === 'admin') {
                $_SESSION['admin_id'] = $adminId;
            }
            
            // Set a default photo for admin
            if ($userType === 'admin') {
                $_SESSION['photo'] = '\Restaurant Management\Flavour Fleet\Admin\images\icon\profile.jpg';
            }

            // Redirect based on user type
            if ($userType === 'admin') {
                header("Location: /Restaurant Management/Flavour Fleet/Admin/index.php");
            } else {
                header("Location: /Restaurant Management/Flavour Fleet/index.html");
            }
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
            header("Location: login.html"); 
            exit();
        }
    } else {
        $_SESSION['error'] = "No user found with that username or email.";
        header("Location: login.html"); 
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
