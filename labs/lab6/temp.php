<!-- Check if the form was submitted and username is not set in session -->
<?php if (isset($_SESSION['form_submitted']) && !isset($_SESSION['username'])): ?>
    <div id="signin-form">
        <form method="post" action="page1.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php endif; ?>

<?php
// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    echo "<p>Welcome, {$_SESSION['username']}!</p>";
}

// Print the number of visits
echo "<p>Number of Visits: $visits</p>";
?>