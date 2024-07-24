<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON input
$input = json_decode(file_get_contents('php://input'), true);
$itemId = $input['id'];
$quantity = $input['quantity'];

// Update cart item quantity
$sql = "UPDATE cart SET quantity = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $quantity, $itemId);

$response = ['success' => false];
if ($stmt->execute()) {
    $response['success'] = true;
}

$stmt->close();
$conn->close();

echo json_encode($response);

