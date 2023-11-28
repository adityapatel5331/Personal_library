<div class="navbar">
    <a href="./main/login.php">Register</a>
    <div class="form-container">
        <form method="post" action="page1.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit" class="btn btn-primary">Sign-in</button>
        </form>
    </div>
    <a href="shoppingcart.php" class="btn btn-primary">Shopping Cart (
        <?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0; ?>)
    </a>
</div>