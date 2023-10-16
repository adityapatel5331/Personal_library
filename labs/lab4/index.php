<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Form1</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>
    <h1>Welcome to the index page 1</h1>

    <?php
    // Function to clean input data as shown in activity 12 by @mosquera.
    function clean($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Initialize variables and error messages
    $email = $firstname = $lastname = $password = $confirmPassword = '';
    $emailErr = $firstnameErr = $lastnameErr = $passwordErr = $confirmPasswordErr = '';
    $isValid = true;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validate email
        if (empty($_POST['email'])) {
            $emailErr = 'Email is a required field';
            $isValid = false;
        } else {
            $email = clean($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid email format';
                $isValid = false;
            }
        }

        // Validate first name
        if (empty($_POST['firstname'])) {
            $firstnameErr = 'First Name is a required field';
            $isValid = false;
        } else {
            $firstname = clean($_POST['firstname']);
            if (!preg_match("/^[a-zA-Z ]/", $firstname)) {
                $firstnameErr = 'Only letters and white space allowed';
                $isValid = false;
            }
        }

        // Validate last name
        if (empty($_POST['lastname'])) {
            $lastnameErr = 'Last Name is a required field';
            $isValid = false;
        } else {
            $lastname = clean($_POST['lastname']);
            if (!preg_match("/^[a-zA-Z'-]+$/", $lastname)) {
                $lastnameErr = 'Invalid last name format';
                $isValid = false;
            }
        }

    }

    // Validate password
    if (!empty($_POST['password'])) {
        $password = clean($_POST['password']);
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/", $password)) {
            $passwordErr = 'Password must contain one uppercase letter, one lowercase letter, one number, and one special character';
            $isValid = false;
        }

        // Validate confirm password
        if (empty($_POST['confirmPassword']) || $_POST['confirmPassword'] !== $password) {
            $confirmPasswordErr = 'Passwords do not match';
            $isValid = false;
        }

        // If all fields are valid, process the form data 
        // if the data matches the requirements in validation field it will take the user to welcome page.
        if ($isValid) {
            header("Location: welcome.php");
            exit();
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        First Name: <input type="text" name="firstname" id="firstname"
            value="<?php echo htmlspecialchars($firstname); ?>"><br>
        <span class="error-message" style="color: red;">
            <?php echo $firstnameErr; ?>
        </span><br>
        Last Name: <input type="text" name="lastname" id="lastname"
            value="<?php echo htmlspecialchars($lastname, ENT_QUOTES); ?>"><br>
        <span class="error-message" style="color: red;">
            <?php echo $lastnameErr; ?>
        </span><br>
        E-mail: <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <span class="error-message" style="color: red;">
            <?php echo $emailErr; ?>
        </span><br>
        Password: <input type="password" name="password" id="password"><br>
        <span class="error-message" style="color: red;">
            <?php echo $passwordErr; ?>
        </span><br>
        Confirm Password: <input type="password" name="confirmPassword" id="confirmPassword"><br>
        <span class="error-message" style="color: red;">
            <?php echo $confirmPasswordErr; ?>
        </span><br>
        <input type="submit">
    </form>

    <?php include 'includes/footer.php'; ?>
</body>

</html>