<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to hold the error messages
    $firstNameError = $lastNameError = $emailError = $passwordError = "";

    // Get the form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Define the regex patterns
    $nameRegex = "/^[a-zA-Z]+( [a-zA-Z]+)?$/";
    $lastNameRegex = "/^[a-zA-Z'-]+$/";
    $emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/";
    $passwordRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/";

    // Validate the form data
    if (!preg_match($nameRegex, $firstName)) {
        $firstNameError = "First name must contain only letters and can include a space for middle name.";
    }

    if (!preg_match($lastNameRegex, $lastName)) {
        $lastNameError = "Last name must contain only letters, apostrophes, or hyphens.";
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
}