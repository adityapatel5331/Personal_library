<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    include("./database.php");
    session_start();
    session_regenerate_id(true);
    $_SESSION['username'] = $userName;

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialize variables to hold the error messages
        $userNameError = $NameError = $emailError = $passwordError = "";

        // Get the form data
        $userName = $_POST["userName"];
        $Name = $_POST["Name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        // Define the regex patterns
        $nameRegex = "/^[a-zA-Z]+( [a-zA-Z]+)?$/";
        $emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/";
        $passwordRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/";

        // Validate the form data
        if (!preg_match($nameRegex, $userName)) {
            $userNameError = "User name must contain only letters.";
        }

        if (!preg_match($emailRegex, $email)) {
            $emailError = "Invalid email address.";
        }

        if (!preg_match($passwordRegex, $password)) {
            $passwordError = "Password must be at least 12 characters long and include one digit, one lowercase letter, one uppercase letter, and one special character.";
        }

        if (empty($password)) {
            $passwordError = "Password is required.";
        }

        if (empty($confirmPassword)) {
            $passwordError = "Confirm Password is required.";
        } else if ($password !== $confirmPassword) {
            $passwordError = "Passwords do not match.";
        }
        // If there are no errors, proceed with database insertion
        if ($userNameError == "" && $NameError == "" && $emailError == "" && $passwordError == "") {
            try {
                // Hash the password before storing it in the database
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
                // Insert user data into Users table
                $statement = $conn->prepare("INSERT INTO Users (username, name, email) VALUES (:user_name, :name, :email)");
                $statement->bindParam(':user_name', $userName);
                $statement->bindParam(':name', $Name);
                $statement->bindParam(':email', $email);
                $statement->execute();

                // Insert login data into Login table
                $statement2 = $conn->prepare("INSERT INTO Login (username, password) VALUES (:username, :password)");
                $statement2->bindParam(':username', $userName);
                $statement2->bindParam(':password', $hashedPassword);
                $statement2->execute();

                // Redirect after successful registration
                header("Location:index.php");
                exit;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo htmlspecialchars($userName, ENT_QUOTES, 'UTF-8');
        }
    }

    // Function to sanitize input data
    function clean($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    ?>

    <div class="form-container">
        <form action="form.php" method="post">
            User Name: <input type="text" name="userName" id="userName"><br>
            <span class="error-message" id="user-name-error">
                <?php echo $userNameError; ?>
            </span><br>
            Name: <input type="text" name="Name" id="Name"><br>
            <span class="error-message" id="name-error">
                <?php echo $NameError; ?>
            </span><br>
            E-mail: <input type="text" name="email" id="email"><br>
            <span class="error-message" id="email-error">
                <?php echo $emailError; ?>
            </span><br>
            Password: <input type="password" name="password" id="password"><br><br>
            Confirm Password: <input type="password" name="confirmPassword" id="confirmPassword"><br>
            <span class="error-message" id="password-error">
                <?php echo $passwordError; ?>
            </span><br>
            <input type="submit">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    $NameError == "" && $emailError == "" &&
                    $passwordError == ""
                ) {
                    try {

                        $statement = $conn->prepare("INSERT INTO Users (username, name, email) VALUES (:user_name, :name, :email)");
                        $statement->bindParam(':user_name', $userName);
                        $statement->bindParam(':name', $Name);
                        $statement->bindParam(':email', $email);

                        $statement->execute();

                        $statement2 = $conn->prepare("INSERT INTO Login (username, password) VALUES   (:username, :password)");
                        $statement2->bindParam(':username', $userName);
                        $statement2->bindParam(':password', $password);
                        $statement2->execute();

                        header("Location:index.php");
                        exit;
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
            }
            ?>
        </form>
    </div>

</body>

</html>