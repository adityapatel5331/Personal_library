<?php
include("./main/cookies1.php");
include("./pdo.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include './main/headers/header1.html'; ?>

<body>
    <?php include './main/navbar.php'; ?>
    <main>
        <h1>Welcome to the politics section of my Book Store Website</h1>
        <?php if (isset($_SESSION['form_submitted']) && !isset($_SESSION['username'])): ?>
            <div id="signin-form">
                <form method="post" action="page1.php">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        <?php endif; ?>

        <?php
        // Check if the username is set in the session
        if (isset($_SESSION['username'])) {
            echo "<p>Welcome, {$_SESSION['username']}!</p>";
        }

        // Print the number of visits
        echo "<p>Number of Visits: $visits</p>";
        ?>
    </main>
    <hr>
    <?php foreach ($books as $key => $book): ?>
        <form method="post" action="addtocart.php">

            <div class="book-container">
                <div class="book-info">
                    <strong>Book Name:</strong>
                    <?php echo $book["Book Name"]; ?><br>
                    <strong>Author:</strong>
                    <?php echo $book["Author"]; ?><br>
                    <strong>ISBN-10:</strong>
                    <?php echo $book["ISBN-10"]; ?><br>
                    <strong>Year of Publication:</strong>
                    <?php echo $book["Year of Publication"]; ?><br>
                    <strong>Genre:</strong>
                    <?php echo $book["Genre"]; ?><br>
                    <strong>Price:</strong>
                    <?php echo $book["Price"]; ?><br>

                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" value="1" min="1" max="10">
                    <input type="hidden" name="book_name" value="<?php echo $book['ISBN-10']; ?>">
                    <input type="hidden" name="book_type" value="index">
                    <button type="submit" class="btn btn-info" name="buy_book">Buy</button>
                </div>
                <div class="book-image">
                    <img src="./images/<?php echo $book['Image']; ?>" alt="Book Cover" width="200" height="300"><br>
                </div>
            </div>
        </form>

        <hr>
    <?php endforeach; ?>

    <a href="index.php" class="btn btn-primary">Go to Index Page</a>
    <a href="biographies.php" class="btn btn-primary">Go to Biography Page</a>
    <a href="politics.php" class="btn btn-primary">Go to Politics Page</a>

    <?php include './main/footers.html'; ?>
</body>

</html>