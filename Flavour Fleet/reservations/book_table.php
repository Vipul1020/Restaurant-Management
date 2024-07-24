<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: /Restaurant Management\Flavour Fleet\signup\login.html?redirect=reservation");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $check_in = $_POST['check_in'];
    $time = $_POST['time'];
    $guest = $_POST['guest'];

    // Validate date format
    if (!DateTime::createFromFormat('Y-m-d', $check_in)) {
        die('Invalid date format. Please enter a valid date.');
    }

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food_website";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, check_in, time, guest_count) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $name, $email, $phone, $check_in, $time, $guest);

    if ($stmt->execute()) {
        // Redirect to confirmation page with reservation details
        header("Location: feedback.php?name=" . urlencode($name) . "&check_in=" . urlencode($check_in) . "&time=" . urlencode($time) . "&guest=" . urlencode($guest));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
