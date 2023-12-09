<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include('db.php');

    $data;
    $emailError = "";
    $generalError = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $mobile = htmlspecialchars($_POST['mobile']);
        $address = htmlspecialchars($_POST['address']);
        $password = htmlspecialchars($_POST['password']);

        if (!(empty($username) || empty($email) || empty($mobile) || empty($password))) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Use password_hash and password_verify for password hashing
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $connection = $pdo->prepare("UPDATE Users SET username = :username, email = :email, mobileNo = :mobile, address = :address, password = :password WHERE username = :un");
                $connection->bindParam(':un', $_COOKIE['data']);
                $connection->bindParam(':username', $username);
                $connection->bindParam(':email', $email);
                $connection->bindParam(':mobile', $mobile);
                $connection->bindParam(':address', $address);
                $connection->bindParam(':password', $hashedPassword);
                $connection->execute();

                setcookie("data", $username, time() + 3600, "/");

                $connection = $pdo->prepare("SELECT * FROM Users WHERE username = :un");
                $connection->bindParam(':un', $_COOKIE['data']);
                $connection->execute();
                $data = $connection->fetch(PDO::FETCH_ASSOC);
            } else {
                $emailError = "Invalid Email";
            }
        } else {
            $generalError = "All Fields Are Required";
        }
    }

    $connection = $pdo->prepare("SELECT * FROM Users WHERE username = :un");
    $connection->bindParam(':un', $_COOKIE['data']);
    $connection->execute();
    $data = $connection->fetch(PDO::FETCH_ASSOC);
    ?>
    <form method="post" action="">
        <p><span>
                <?php echo $generalError; ?>
            </span></p>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>" required>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="<?php echo $data['password']; ?>" required>

        <label for="email">Email: <span>
                <?php echo $emailError; ?>
            </span></label>
        <input type="email" id="email" name="email" value="<?php echo $data['email']; ?>" required>

        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" value="<?php echo $data['mobileNo']; ?>" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required><?php echo $data['address']; ?></textarea>

        <button type="submit">Update</button>
    </form>
</body>

</html>