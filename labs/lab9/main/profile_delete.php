<?php
include "./connect.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Fetch user information from the database based on the logged-in email
$email = $_SESSION['email'];
$stmt = $pdo->prepare("SELECT email, username, address FROM Users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmDelete'])) {
    // Process the form submission for profile deletion

    // Delete user information from the database
    $deleteStmt = $pdo->prepare("DELETE FROM Users WHERE email = :email");
    $deleteStmt->bindParam(':email', $email);

    if ($deleteStmt->execute()) {
        // Logout the user after successful deletion
        session_destroy();
        header('Location: index.php'); // Redirect to the home page or login page
        exit();
    } else {
        // Handle deletion error
        $deleteError = "Error deleting profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>
    <h2>Welcome to Your Profile</h2>

    <p>Email: <?php echo $userInfo['email']; ?></p>
    <p>First Name: <?php echo $userInfo['username']; ?></p>
    <p>Address: <?php echo $userInfo['address']; ?></p>

    <form action="profile.php" method="post">
        <input type="submit" name="deleteProfile" value="Delete Profile">
    </form>

    <?php if (isset($deleteError)) { ?>
        <p style="color: red;"><?php echo $deleteError; ?></p>
    <?php } ?>

    <?php
    if (isset($_POST['deleteProfile'])) {
        echo '<p>Are you sure you want to delete your profile?</p>';
        echo '<form action="profile.php" method="post">';
        echo '<input type="checkbox" id="confirmDelete" name="confirmDelete" required>';
        echo '<label for="confirmDelete">Yes, I confirm the deletion.</label><br><br>';
        echo '<input type="submit" value="Delete Profile">';
        echo '</form>';
    }
    ?>

    <a href="profile_update.php">Update Profile</a>
    <br>
    <a href="logout.php">Logout</a>
</body>

</html>
