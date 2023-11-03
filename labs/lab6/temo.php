<?php
// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    echo "<p>Welcome, {$_SESSION['username']}!</p>";
}

// Print the number of visits
echo "<p>Number of Visits: $visits</p>";
?>