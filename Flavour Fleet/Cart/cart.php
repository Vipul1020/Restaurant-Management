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

// Fetch cart items
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <h1>Your Cart</h1>
    </header>
    <main class="main">
      <?php if (!empty($cart_items)): ?>
        <table class="cart-table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Item Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cart_items as $item): ?>
              <tr data-id="<?php echo $item['id']; ?>">
                <td><img src="<?php echo htmlspecialchars($item['item_image']); ?>"alt="Item Image"></td>
                <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                <td>$<?php echo number_format($item['item_price'], 2); ?></td>
                <td class="quantity"><?php echo htmlspecialchars($item['quantity']); ?></td>
                <td class="item-total">$<?php echo number_format($item['item_price'] * $item['quantity'], 2); ?></td>
                <td>
                  <button class="btn increase-quantity">+</button>
                  <button class="btn decrease-quantity">-</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <section class="cart-summary">
        <p id="totalAmount" style="display: block; color: #e52b34; font-size: 1.5em; margin-bottom: 20px; font-weight: bold; text-align: center;">
              Total Amount: $<?php echo number_format($total_sum, 2); ?></p>            
              <form method="post" action="checkout.php">
                <div class="button-wrapper">
                    <button type="submit" class="btn checkout-button">Checkout</button>
                </div>
            </form>
        </section>
      <?php else: ?>
        <p class="empty-cart-message">Your cart is empty. <a href="../index.html" class="btn home-link">Go back to home page</a></p>
      <?php endif; ?>
    </main>
  </div>

  <script src="scripts.js"></script>
</body>

</html>
