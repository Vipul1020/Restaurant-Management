<?php
session_start();

require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['email'])) {
    header("Location: \signup\login.html?redirect=checkout");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$address = $_POST['address'];
$payment_method = $_POST['payment_method'];
$discount_code = $_POST['discount_code'] ?? '';
$user_email = $_SESSION['email'];

// Fetch cart items to calculate total amount and apply discounts
$cart_sql = "SELECT * FROM cart";
$cart_result = $conn->query($cart_sql);

$total_sum = 0;
if ($cart_result->num_rows > 0) {
    while ($row = $cart_result->fetch_assoc()) {
        $total_sum += $row['item_price'] * $row['quantity'];
    }
}

// Calculate discount
$discount_amount = 0;
if ($discount_code === 'DISCOUNT10') {
    $discount_amount = $total_sum * 0.10; // 10% discount
}
$total_sum -= $discount_amount;

// Insert order into the database
$order_sql = "INSERT INTO orders (email, address, payment_method, total_amount, discount_amount, order_date) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($order_sql);
$stmt->bind_param("sssdd", $user_email, $address, $payment_method, $total_sum, $discount_amount);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Copy cart items to order_items and clear the cart
$cart_result->data_seek(0); // Reset result pointer
while ($row = $cart_result->fetch_assoc()) {
    $item_sql = "INSERT INTO order_items (order_id, item_name, item_price, quantity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($item_sql);
    $stmt->bind_param("isdi", $order_id, $row['item_name'], $row['item_price'], $row['quantity']);
    $stmt->execute();
    $stmt->close();
}

// Clear the cart
$clear_cart_sql = "DELETE FROM cart WHERE 1";
$conn->query($clear_cart_sql);
$conn->close();

// Send confirmation email
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vipultech100@gmail.com';
    $mail->Password = 'blackdragon';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('vipultech100@gmail.com', 'Flavour Fleet');
    $mail->addAddress($user_email); // Add a recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Order Confirmation';
    $mail->Body    = 'Dear ' . htmlspecialchars($user_email) . ',<br><br>Your order has been placed successfully. Your order ID is ' . $order_id . '.<br>Total Amount: $' . number_format($total_sum, 2) . '<br>Discount Applied: $' . number_format($discount_amount, 2) . '<br><br>Thank you for shopping with us!';

    $mail->send();
    echo 'Order confirmation email sent.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("Location: confirmation.php?order_id=$order_id");
exit();
?>
