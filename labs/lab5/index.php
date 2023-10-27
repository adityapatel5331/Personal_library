<?php include './main/cookies1.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include './main/headers/header1.html'; ?>

<body>
    <div class="navbar">
        <a href="page1.php">Home</a>
        <div class="form-container">
            <form method="post" action="page1.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <button type="submit" class="btn btn-primary">Sign-in</button>
            </form>
        </div>
    </div>
    <main>
        <h1>Welcome to the politics section of my Book Store Website</h1>

        <?php include './main/cookies2.php'; ?>
        ?>
    </main>

    <hr>
    <?php include './main/list1.php'; ?>
    <a href="index.php" class="btn btn-primary">Go to Index Page</a>
    <a href="biographies.php" class="btn btn-primary">Go to Biography Page</a>
    <a href="politics.php" class="btn btn-primary">Go to Politics Page</a>

    <?php include './main/footers.html'; ?>
</body>

</html>