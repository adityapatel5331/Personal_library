<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

        p {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }

        /* You can customize the styles for each individual paragraph */
        p:nth-child(odd) {
            background-color: #f9f9f9;
        }

        p:nth-child(even) {
            background-color: #e5e5e5;
        }
    </style>
</head>
<body>
    <?php
    include('db.php');
    $username = $_COOKIE['data'];
    $connection = $pdo->prepare("SELECT * FROM Users WHERE username = :username");
    $connection->bindParam(':username', $username);
    $connection->execute();

    $data = $connection->fetch(PDO::FETCH_ASSOC);
    $user = $data['username'];
    $email = $data['email'];
    $address = $data['address'];
    $mobile = $data['mobileNo'];
    ?>
    <p>
        Username:
        <?php echo $user; ?>
    </p>
    <p>
        Email:
        <?php echo $email; ?>
    </p>
    <p>
        Address:
        <?php echo $address ?>
    </p>
    <p>
        Mobile Number:
        <?php echo $mobile ?>
    </p>
</body>
</html>