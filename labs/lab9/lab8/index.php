<?php
include("./main/cookies1.php");
include "./database.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php include './main/headers/header1.html'; ?>

<body>
    <?php include './main/navbar.php'; ?>
    <main>
        <h1>Welcome to the politics section of my Book Store Website</h1>
        <a href="form.php" class="btn btn-primary">register</a>

        <?php //endif; ?>

        <?php
        // Check if the username is set in the session
        if (isset($_SESSION['username'])) {
            echo "<p>Welcome, {$_SESSION['username']}!</p>";
        }
        if ($_SESSION['userInfo'] != NULL) {
            echo '<a href="user.php">User Profile</a>';
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