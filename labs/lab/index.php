<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <!-- the form and css are taken from chatgpt -->
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
    </style>
</head>

<body>
    <?php
    include('db.php');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        if (!(empty($username) || empty($email) || empty($mobile) || empty($password) || empty($password))) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "in condition";
                $connection = $pdo->prepare("INSERT INTO Users (username, email, mobileNo, address, password) VALUES (:username, :email, :mobile, :address, :password)");
                
                $connection->bindParam(':username', $username);
                $connection->bindParam(':email', $email);
                $connection->bindParam(':mobile', $mobile);
                $connection->bindParam(':address', $address);
                $connection->bindParam(':password', $password);
                
                $connection->execute();
                
                header('Location: login.php');
            }
        }
    }


    ?>

    <!-- the form was taken from chatgpt -->

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <button type="submit">Submit</button>
    </form>
    <a href="login.php">login page</a>
</body>

</html>