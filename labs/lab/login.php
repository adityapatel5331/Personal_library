<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    include('database.php');
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $connection = $pdo->prepare("SELECT * FROM Users WHERE username = :username");
            $connection->bindParam(':username', $username);
            $connection->execute();
    
            $data = $connection->fetch(PDO::FETCH_ASSOC);
    
            if ($data && $data['password'] === $password) {
                setcookie("data", $data['username'], time() + 3600, "/");
                header('Location: home.php');
            }
        }
    ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>