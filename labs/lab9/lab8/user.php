<?php
session_start();

require "database.php";

if (!isset($_SESSION['userInfo'])) {
    header("Location: index.php");
    exit();
}

$userInfo = $_SESSION['userInfo'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Welcome,
                    <?php echo $userInfo['username']; ?>
                </h2>
                <p><strong>Name:</strong>
                    <?php echo $userInfo['name']; ?>
                </p>
                <p><strong>Email:</strong>
                    <?php echo $userInfo['email']; ?>
                </p>
            </div>
        </div>
    </div>
</body>

</html>