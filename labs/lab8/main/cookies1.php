<?php
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    // Store username in a session variable
    $_SESSION['username'] = $_POST['username'];
    // Set a flag to indicate form submission
    $_SESSION['form_submitted'] = true;
    // Redirect to prevent form resubmission on page refresh
    // header("Location: page1.php");
    // exit();
}

// Check if the form was submitted in this or previous requests
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    // If the form was submitted, unset the flag to avoid redirection on subsequent requests
    unset($_SESSION['form_submitted']);
}

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = null;
}

// Increment visit count or initialize to 1
if (isset($_COOKIE['visits'])) {
    $visits = $_COOKIE['visits'] + 1;
} else {
    $visits = 1;
}

// Set the 'visits' cookie
setcookie('visits', $visits, time() + 31536000, '/');

// Array of books

include './main/list1.php';
