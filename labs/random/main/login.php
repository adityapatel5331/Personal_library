<?php
session_start();

// initializing variables
$hostname = "db.cs.dal.ca";
$username = "patel29";
$password = "CuMHtWKducro62GJnAiEbu6uu";
$database = "patel29";

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection to the database works!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Terminate script if connection fails
}

$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    // $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username OR email=:email LIMIT 1");
    // $stmt->bindParam(':username', $username);
    // $stmt->bindParam(':email', $email);
    // $stmt->execute();
    // $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // if ($user) { // if user exists
    //     if ($user['username'] === $username) {
    //         array_push($errors, "Username already exists");
    //     }

    //     // if ($user['email'] === $email) {
    //     //     array_push($errors, "Email already exists");
    //     // }
    // }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); // encrypt the password before saving in the database

        $stmt = $pdo->prepare("INSERT INTO users (username, email, password)        
         VALUES(:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: shoppingcart.php');
        exit(); // Terminate script after redirection
    } else {
        for ($i = 0; $i < sizeof($errors); $i++) {
            echo ($errors[$i]);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="button" onclick="location.href='../index.php';">Register</button>
        </div>
        <p>
            Already a member? <a href="../index.php">Sign in</a>
        </p>
    </form>
</body>

</html>