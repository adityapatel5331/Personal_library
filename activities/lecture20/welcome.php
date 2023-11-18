<html>

<body>

    Welcome to welcome.php file.<br><br>
    This page will show all the information about user profile, except for password for confidentiality purpose.<br>
    <!--  use to print the information -->
    Your First name is :<bold>
        <?php echo $_POST["firstName"]; ?><br>
    </bold>
    Your Last name is :<bold>
        <?php echo $_POST["lastName"]; ?><br>
    </bold>
    Your email address is:
    <?php echo $_POST["email"]; ?><br>


</body>

</html>