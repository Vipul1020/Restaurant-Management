<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_image = $_POST['item_image'];
    $quantity = 1; 

    $sql = "INSERT INTO cart (item_id, item_name, item_price, item_image, quantity) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdsi", $item_id, $item_name, $item_price, $item_image, $quantity);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Item added to cart successfully!';
    } else {
        $response['message'] = 'Error: ' . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
