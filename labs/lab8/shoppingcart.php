<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .cart-item {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Shopping Cart</h1>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                echo '<div class="cart-item">';
                echo "<strong>Book Name:</strong> " . $item["Book Name"] . "<br>";
                echo "<strong>Author:</strong> " . $item["Author"] . "<br>";
                echo "<strong>ISBN-10:</strong> " . $item["ISBN-10"] . "<br>";
                echo "<strong>Price:</strong> " . $item["Price"] . "<br>";
                echo "<strong>Quantity:</strong> " . $item["quantity"] . "<br>";
                echo '<img src="./images/' . $item["Image"] . '" alt="Book Cover" width="200" height="300"><br>';
                echo '</div>';
            }
        } else {
            echo '<p>Your cart is empty.</p>';
        }
        ?>

        <div class="total-price" style="background-color: #87CEFA; color: black; padding: 10px; margin-bottom: 10px; border-radius: 10px;">
            <strong>Total Price: $</strong>
            <?php
            if (isset($_SESSION['total_price'])) {
                echo $_SESSION['total_price'];
            } else {
                echo 0;
            }
            ?>
        </div>

        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
        <a href="#" class="btn btn-primary">Check out</a>
    </div>
</body>

<footer>
    <p>&copy; Aditya Patel</p>
</footer>

</html>