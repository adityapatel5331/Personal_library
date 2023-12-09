<?php  include './main/cookies1.php';?>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<?php include './main/headers/header1.html'; ?>

<body>
    <main>
        <?php include 'logoutButton.php'; ?>
        <h1>Welcome to the politics section of my Book Store Website</h1>
        <?php include './main/cookies2.php'; ?>

        <?php include './main/list1.php'; ?>
        <?php include './main/listofBooks.php'; ?>
    </main>
    <hr>
    <a href="index.php" class="btn btn-primary">Go to Index Page</a>
    <a href="biographies.php" class="btn btn-primary">Go to Biography Page</a>
    <a href="politics.php" class="btn btn-primary">Go to Politics Page</a>

    <?php include './main/footers.html'; ?>

</body>

</html>