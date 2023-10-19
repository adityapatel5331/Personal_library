<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    setcookie('username', $username, time() + 31536000, '/');
    // Set the username cookie
} else {
    $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
}
// Set the visit cookie
if (!isset($_COOKIE['visits'])) {
    $_COOKIE['visits'] = 1; //default value is 1 provided
} else {
    $_COOKIE['visits'] = $_COOKIE['visits'] + 1;
    // Every visit will increase our number of visit by 1.
}
$visits = $_COOKIE['visits'];

setcookie('visits', $visits, time() + 31536000, '/');
// Here instead of using the multiplication of 3600 * 24 * 365, I have directly added numeric value of multiplication (for fun!!!)
include('welcome.php')
    ?>