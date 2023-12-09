<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="index.php" class="btn btn-primary">Home</a>
        <div class="form-container">
            <form method="post" action="index.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <input type="password" id="password" name="password" required>
                <button type="submit" class="btn btn-primary">Sign-in</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_BCRYPT);

                $statement = $conn->prepare("SELECT * FROM Login WHERE username= :username AND password = :password");

                $statement->bindParam(':username', $username);
                $statement->bindParam(':password', $password);

                $statement->execute();
                $userName = $statement->fetch($conn::FETCH_ASSOC);

                if ($userName) {
                    $username = $userName['username'];
                    $statement2 = $conn->prepare("SELECT * FROM Users WHERE username=:username");
                    $statement2->bindParam(':username', $username);
                    $statement2->execute();
                    $userInfo = $statement2->fetch($conn::FETCH_ASSOC);
                    $_SESSION['userInfo'] = $userInfo;
                    header('Location: index.php');
                    exit;
                } else {
                    echo '<span class="error-message">Invalid username or password.</span>';
                }
            }
            ?>
        </div>
        <a href="shoppingcart.php" class="btn btn-primary">Shopping Cart (
            <?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0; ?>)
        </a>
    </div>

</body>

</html>