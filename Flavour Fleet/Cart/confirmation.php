<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: \signup\login.html?redirect=cart");
    exit();
}

$order_id = $_GET['order_id'] ?? null;

if (!$order_id) {
    die("Invalid order ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .confirmation-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            color: #e52b34;
            margin-bottom: 20px;
            animation: slideIn 1s ease-in-out;
        }
        p {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-in-out;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #e52b34;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #c51c2c;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h1>Order Confirmation</h1>
        <p>Thank you for your order! Your order number is <?php echo htmlspecialchars($order_id); ?>.</p>
        <a href="cart.php" class="btn-back">Back to Cart</a>
    </div>
</body>
</html>
