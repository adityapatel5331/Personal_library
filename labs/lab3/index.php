<?php include 'includes/header.php'; ?>

<script>
    // function validateForm will validate the form.

    function validateForm() {
        // we will enter the value from different boxes in the assigned variable

        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        //use of regex expression 

        var nameRegex = /^[a-zA-Z]+( [a-zA-Z]+)?$/; // Allow space for middle name
        var lastNameRegex = /^[a-zA-Z'-]+$/; // Allow apostrophe and hyphen in last name
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
        var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/;
        // storing the errors from different validation inside the variables

        var firstNameError = document.getElementById("first-name-error");
        var lastNameError = document.getElementById("last-name-error");
        var emailError = document.getElementById("email-error");
        var passwordError = document.getElementById("password-error");
        //  firstly the error content for every category will be an empty string 

        firstNameError.textContent = "";
        lastNameError.textContent = "";
        emailError.textContent = "";
        passwordError.textContent = "";

        var isValid = true;
        // if there is any issue, isValid will become false;

        if (!firstName.match(nameRegex)) {
            firstNameError.textContent = "First name must contain only letters and can include a space for middle name.";
            isValid = false;
        }

        if (!lastName.match(lastNameRegex)) {
            lastNameError.textContent = "Last name must contain only letters, apostrophes, or hyphens.";
            isValid = false;
        }

        if (!email.match(emailRegex)) {
            emailError.textContent = "Invalid email address.";
            isValid = false;
        }

        if (!password.match(passwordRegex)) {
            passwordError.textContent = "Password must be at least 12 characters long and include one digit, one lowercase letter, one uppercase letter, and one special character.";
            isValid = false;
        }

        if (password.trim() === "") {
            passwordError.textContent = "Password is required.";
            isValid = false;
        }

        if (confirmPassword.trim() === "") {
            passwordError.textContent = "Confirm Password is required.";
            isValid = false;
        } else if (password !== confirmPassword) {
            passwordError.textContent = "Passwords do not match.";
            isValid = false;
        }

        return isValid;
    }

</script>

<body>
    <h1>Welcome to the index page </h1>
    <bold> If you want to move on the welcome page, Please fill the form given below!!!<bold>
            <br><br><br>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed totam illo dolorem! Nostrum quos eius
            consectetur beatae, quidem maiores laudantium. Possimus perferendis qui suscipit corporis eligendi at
            blanditiis, quos ipsa ab molestias labore cupiditate perspiciatis vel nemo nostrum esse laudantium, hic
            minus similique dolore doloremque placeat velit. Aliquam, deleniti doloremque?
            <div class="form-container">
                <form action="welcome.php" method="post" onsubmit="return validateForm()">
                    First Name: <input type="text" name="firstName" id="firstName"><br>
                    <span class="error-message" id="first-name-error"></span><br>
                    Last Name: <input type="text" name="lastName" id="lastName"><br>
                    <span class="error-message" id="last-name-error"></span><br>
                    E-mail: <input type="text" name="email" id="email"><br>
                    <span class="error-message" id="email-error"></span><br>
                    Password: <input type="password" name="password" id="password"><br>
                    Confirm Password: <input type="password" name="confirmPassword" id="confirmPassword"><br>
                    <span class="error-message" id="password-error"></span><br>
                    <input type="submit">
                </form>
            </div>
</body>


</html>

<?php include 'includes/footer.php'; ?>