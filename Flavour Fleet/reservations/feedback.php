<?php
// Get reservation details from query parameters
$name = htmlspecialchars($_GET['name']);
$check_in = htmlspecialchars($_GET['check_in']);
$time = htmlspecialchars($_GET['time']);
$guest = htmlspecialchars($_GET['guest']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmation</title>
    <link rel="stylesheet" href="feedback-style.css"> 
</head>
<body>
    <div class="container">
        <h1>Reservation Confirmed</h1>
        <p>Thank you for your reservation. Here are the details:</p>
        <ul>
            <li><strong>Name:</strong> <?php echo $name; ?></li>
            <li><strong>Reserved Date:</strong> <?php echo $check_in; ?></li>
            <li><strong>Time:</strong> <?php echo $time; ?></li>
            <li><strong>Guest Count:</strong> <?php echo $guest; ?></li>
        </ul>
        <a href="\Restaurant Management\Flavour Fleet\index.html" class="btn btn-primary">Return to Homepage</a>
    </div>
</body>
</html>
