<?php

session_start();
if (isset($_SESSION['loggedin'])) {
	if ($_SESSION['loggedin'] == true) header("Location: products");
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="styles/login.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
	<div class="login">
		<h1 class="text-center">Login</h1>
		<form action="authenticate.php" method="post">

			<div class="container">
				<input type="text" placeholder="Username" name="username" required>
				<input type="password" placeholder="Password" name="password" required>
				<button type="submit">Login</button>
			</div>

		</form>
	</div>
</body>

</html>