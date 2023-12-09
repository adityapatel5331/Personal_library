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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission for profile update
    $newUsername = $_POST['newUsername'];
    $newAddress = $_POST['newAddress'];

    // Password-related fields
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    // Validate the input (add your validation logic)

    // Check if the current password is correct before updating
    $passwordCheckStmt = $pdo->prepare("SELECT password FROM Login WHERE username = :email");
    $passwordCheckStmt->bindParam(':email', $email);
    $passwordCheckStmt->execute();
    $existingPasswordHash = $passwordCheckStmt->fetchColumn();

    if (password_verify($currentPassword, $existingPasswordHash)) {
        // Current password is correct, proceed with the update

        // Update the user information in the database
        $updateStmt = $pdo->prepare("UPDATE Users SET username = :newUsername, address = :newAddress WHERE email = :email");
        $updateStmt->bindParam(':newUsername', $newUsername);
        $updateStmt->bindParam(':newAddress', $newAddress);
        $updateStmt->bindParam(':email', $email);

        if ($updateStmt->execute()) {

            // If the user entered a new password, update it as well
            if (!empty($newPassword) && $newPassword === $confirmNewPassword) {
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updatePasswordStmt = $pdo->prepare("UPDATE Login SET password = :password WHERE username = :email");
                $updatePasswordStmt->bindParam(':password', $hashedNewPassword);
                $updatePasswordStmt->bindParam(':email', $email);
                $updatePasswordStmt->execute();
            }

            header('Location: profile.php'); // Redirect to the profile page
            exit();
        } else {
            // Handle update error
            $updateError = "Error updating profile.";
        }
    } else {
        // Incorrect current password
        $passwordError = "Incorrect current password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>

<body>
    <h2>Update Your Profile</h2>

    <?php if (isset($updateError)) { ?>
        <p style="color: red;"><?php echo $updateError; ?></p>
    <?php } ?>

    <form action="profile_update.php" method="post">
        <label for="newUsername">New Username:</label>
        <input type="text" id="newUsername" name="newUsername" value="<?php echo $userInfo['username']; ?>" required><br><br>

        <label for="newAddress">New Address:</label>
        <input type="text" id="newAddress" name="newAddress" value="<?php echo $userInfo['address']; ?>"><br><br>

        <!-- Password-related fields -->
        <label for="currentPassword">Current Password:</label>
        <input type="password" id="currentPassword" name="currentPassword" required><br><br>

        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword"><br><br>

        <label for="confirmNewPassword">Confirm New Password:</label>
        <input type="password" id="confirmNewPassword" name="confirmNewPassword"><br><br>

        <input type="submit" value="Update Profile">
    </form>

    <?php if (isset($passwordError)) { ?>
        <p style="color: red;"><?php echo $passwordError; ?></p>
    <?php } ?>

    <a href="profile.php">Back to Profile</a>
</body>

</html>
