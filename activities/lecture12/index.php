<?php
// Create your variables for your form data
// In this case, we can leave them empty since
// the value they'll hold will be provided when
// the user submits the form
$valid = '';
$postMsg = '';
$email = '';
$password = '';
$firstName = '';
$lastName = '';

// Lets create a function that cleans the data provided by the user 
// through the input fields
function clean($input)
{
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

// Lets try to validate our email input by using regular expressions
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	$postMsg = 'There was a POST request';
// 	if (empty($_POST['email'])) {
// 		$email = 'Email is required';
// 	} else {
// 		$email = clean($_POST['email']);
// 		$emailRegex = '/^[^@]+@[^@]+\.[a-z]{2,5}/i';
// 		if (!preg_match($emailRegex, $email)) {
// 			$email = 'invalid email';
// 		} else {
// 			$email = 'valid email: ' . $email;
// 		}
// 	}
// }

// Lets try to validate the email input using filters
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$postMsg = 'There was a POST request';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Validate First Name
		if (empty($_POST['firstName'])) {
			$firstName = 'First Name is required';
		} else {
			$firstName = clean($_POST['firstName']);
			// Allow letters, non-case sensitive, and space for middle name
			if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
				$firstName = 'Invalid First Name';
			} else {
				$firstName = 'Valid First Name: ' . $firstName;
			}
		}

		// Validate Last Name
		if (empty($_POST['lastName'])) {
			$lastName = 'Last Name is required';
		} else {
			$lastName = clean($_POST['lastName']);
			// Allow letters, non-case sensitive, apostrophes, and hyphens
			if (!preg_match("/^[a-zA-Z'-]*$/", $lastName)) {
				$lastName = 'Invalid Last Name';
			} else {
				$lastName = 'Valid Last Name: ' . $lastName;
			}
		}

		// Validate Email (your existing email validation code)
		if (empty($_POST['email'])) {
			$email = 'Email is required field';
		} else {
			$email = clean($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$email = 'Email is invalid.';
			} else {
				$email = 'Email in valid.';
			}
		}

		// Validate Password
		if (empty($_POST['password']) || strlen($_POST['password']) < 12) {
			$password = 'Password should be at least 12 characters long';
		} else {
			$password = clean($_POST['password']);
			// Use regex to enforce at least one number, one uppercase letter,
			// one lowercase letter, and one special character
			if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/", $password)) {
				$password = 'Invalid Password';
			} else {
				$password = 'Valid Password';
			}
		}

	}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Registration Page</title>
	<meta name="description" content="Registration Page (Loops)">
	<meta name="author" content="Gabriella Mosquera">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="container">
		<form id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<fieldset>
				<legend>Registration</legend>
				<p>
					<label for="firstName">First Name : </label>
					<input name="firstName" id="firstName" type="text" size="29">
				</p>
				<p>
					<label for="lastName">Last Name: </label>
					<input name="lastName" id="lastName" type="text" size="29">
				</p>
				<p>
					<label for="email">Email Address: </label>
					<input name="email" id="email" type="text" size="29">
				</p>
				<p>
					<label for="password">Password: </label>
					<input name="password" id="password" type="password" size="20">
				</p>
				<input type="submit" name="submit" value="Register">
				<!-- <button
					onclick="document.getElementById('email').reset(); document.getElementById('password').reset(); return false;">
					CLEAR ENTRY
				</button> -->
			</fieldset>
			<p> <span class="error">Valid or Not: </span><em>
					<?= $valid; ?>
				</em></p>
			<p> <span class="success">Email: </span><em>
					<?= $email; ?>
				</em></p>
			<p> <span class="success">First Name: </span><em>
					<?= $firstName; ?>

				</em></p>
			<p> <span class="success">Last Name: </span><em>

					<?= $lastName; ?>
					<p> <span class="success">Password: </span><em>
							<?= $password; ?>
						</em></p>
					<p> <span class="success">Post Message: </span><em>
							<?= $postMsg; ?>
						</em></p>
		</form>
	</div>
</body>

</html>