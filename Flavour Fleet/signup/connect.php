<?php
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$confirmPassword= $_POST['confirmPassword'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'food_website');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($password !== $confirmPassword) {
    die("Passwords do not match");
}

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, phone, address, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $username, $email, $phone, $address, $hashedPassword);

if ($stmt->execute()) {
    header("Location: login.html");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
