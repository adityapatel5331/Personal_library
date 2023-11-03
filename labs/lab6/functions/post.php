<?php if (isset($_SESSION['form_submitted']) && !isset($_SESSION['username'])): ?>
    <div id="signin-form">
        <form method="post" action="page1.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php endif; ?>