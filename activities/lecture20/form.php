    <div class="form-container">
        <form action="welcome.php" method="post" onsubmit="return validateForm()">
            First Name: <input type="text" name="firstName" id="firstName"><br>
            <span class="error-message" id="first-name-error"></span><br>
            Last Name: <input type="text" name="lastName" id="lastName"><br>
            <span class="error-message" id="last-name-error"></span><br>
            E-mail: <input type="text" name="email" id="email"><br>
            <span class="error-message" id="email-error"></span><br>
            Password: <input type="password" name="password" id="password"><br><br>
            Confirm Password: <input type="password" name="confirmPassword" id="confirmPassword"><br>
            <span class="error-message" id="password-error"></span><br>
            <input type="submit">
        </form>
    </div>