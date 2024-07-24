<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: /Restaurant Management/Flavour Fleet/signup/login.html?redirect=checkout");
    exit();
}

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

// Fetch user cart items
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

$cart_items = [];
$total_sum = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
        $total_sum += $row['item_price'] * $row['quantity'];
    }
}
$conn->close();

date_default_timezone_set('Asia/Kolkata');
$estimated_delivery = date('l, F j, Y \a\t g:i A', strtotime('+30 minutes'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout-styles.css">
    <script>
        // Pass total sum from PHP to JavaScript
        var totalSum = <?php echo json_encode($total_sum); ?>;
    </script>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Checkout</h1>
        </header>
        <main class="main">
            <div class="order-summary">
                <h2>Order Summary</h2>
                <table class="order-summary-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                            <td>$<?php echo number_format($item['item_price'], 2); ?></td>
                            <td>$<?php echo number_format($item['item_price'] * $item['quantity'], 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p><strong>Total Amount: $<span id="total_amount"><?php echo number_format($total_sum, 2); ?></span></strong></p>
            </div>

            <form method="post" action="process_checkout.php">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="payment_method">Payment Method:</label>
                    <select id="payment_method" name="payment_method" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="discount_code">Discount Code:</label>
                    <input type="text" id="discount_code" name="discount_code">
                    <button type="button" id="apply_discount">Apply</button>
                </div>
                <div class="discount-summary">
                    <p id="discount_amount">Discount: $0.00</p>
                </div>

                <div class="form-group">
                    <label for="estimated_delivery">Estimated Delivery Time:</label>
                    <input type="text" id="estimated_delivery" name="estimated_delivery" value="<?php echo htmlspecialchars($estimated_delivery); ?>" readonly>
                </div>

                <button type="submit" class="btn checkout-button">Place Order</button>
            </form>
            
            <div class="secure-checkout">
                <h3>Secure Checkout</h3>
                <p>Your information is securely encrypted and protected.</p>
                <img src="81566.png" alt="Secure Payment" />
            </div>
        </main>
    </div>
    <script src="checkout_script.js"></script>
</body>
</html>
