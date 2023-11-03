<?php
include("./main/cookies1.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include './main/headers/header1.html'; ?>

<body>
    <?php include './main/navbar.php'; ?>
    <main>
        <h1>Welcome to the politics section of my Book Store Website</h1>
        <?php include 'post.php' ?>
        <?php include 'temo.php' ?>
    </main>
    <hr>
    <?php include 'foreach.php'; ?>

    <a href="index.php" class="btn btn-primary">Go to Index Page</a>
    <a href="biographies.php" class="btn btn-primary">Go to Biography Page</a>
    <a href="politics.php" class="btn btn-primary">Go to Politics Page</a>

    <?php include './main/footers.html'; ?>
</body>

</html>