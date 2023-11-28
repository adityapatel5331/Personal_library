<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        setcookie('username', $username, time() + 31536000, '/');

        // Set the visit cookie
        if (!isset($_COOKIE['visits'])) {
            $_COOKIE['visits'] = 1; //default value is 1 provided
        } else {
            $_COOKIE['visits'] = $_COOKIE['visits'] + 1;
            // Every visit will increase our number of visits by 1.
        }
        $visits = $_COOKIE['visits'];
        setcookie('visits', $visits, time() + 31536000, '/');

        // Welcome Message
        echo "Welcome, $username!";
    }
}
?>