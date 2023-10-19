<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Cookie Counter</title>
	<meta name="description" content="Registration Page (Loops)">
	<meta name="author" content="Aditya Patel">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section id="container">
		<form action="welcome.php" class="form" method="post">
			<label for="username">Enter your username:</label>
			<input type="text" id="username" name="username">
			<button type="submit">Submit</button>
		</form>
		<?php
		$visits = isset($_COOKIE['visits']) ? $_COOKIE['visits'] : 0;
		//use of cookie for usename variable.
		if (isset($_POST['username'])) {
			$username = htmlspecialchars($_POST['username']);
			setcookie('username', $username, time() + 31536000, '/');
			$visits = isset($_COOKIE['visits']) ? $_COOKIE['visits'] + 1 : 1;
			setcookie('visits', $visits, time() + 31536000, '/');
		} else {
			$username = isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : '';
		}

		if (!empty($username)) {
			echo '<h1>Welcome back, ' . $username . '! This is visit number <span class=\'important\'>' . $visits . '</span></h1>';
		} else {
			echo "<h1>Welcome to our website for the first time!</h1>";
		}
		?>

	</section>
</body>

</html>