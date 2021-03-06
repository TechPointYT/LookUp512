<?php
	if(!isset($_SESSION)){
		session_start();
	}
?>

<html lang ="en">

<head>
	<title>LookUp512</title>
	<meta charset="UTF-8">
	<meta name="description" content="Events in Austin">
	<meta name="author" content="Luis Piña, David Alvarez, Jack Thielman">
	<link rel="stylesheet" type="text/css" href="LookUp512.css">
	<link rel="stylesheet" type="text/css" href="phpPagesCSS.php">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="login.js"></script>
</head>

<body>

	<div id="title">
		<img src="images/logos/logo2.png" alt="logo" width="450" height="200">
	</div>

	<div id="navBar">
		<ul>
			<div id="logoContainer" class="container">
				<a href="index.html"> <img id="logo" width="30" height="30" src="images\logos\logo.png" alt="Logo"> </a>
			</div>

			<li>
				<a href="Events.php">Events</a>
				<a href="Parks.html">Parks</a>
				<a href="Restaurants.html">Restaurants</a>
				<a href="History.html">History</a>
				<a href="ContactUs.html">Contact Us</a>
			</li>

			<div id="loginSearch">
				<table>
					<tr>
						<td id="loginContainer" class="container">
							<a href="login.php"> <input type="button" value="Log In"> </a>
						</td>
					</tr>
				</table>
			</div>
		</ul>
	</div>

  	<form id="loginForm" method="post">
	  	<table class="events">
			<tr>
				<td>
				<label for="username"><b>Username</b></label>
				<input id="username" type="text" placeholder="Enter Username" name="username" minlength="5" maxlength="10" required>
				</td>
			</tr>
			<tr>
				<td>
				<label for="password"><b>Password</b></label>
				<input id="password" type="password" placeholder="Enter Password" name="password" minlength="6" maxlength="16" required>
				</td>
			</tr>
			<tr>
				<td> <button class="butts" type="submit">Login</button> </td>
			</tr>
	  	</table>
		<p>Register <a href="register.html">here</a>.</p>
	</form>

	<?php
		if(isset($_COOKIE["username"])){
			echo "<script>document.getElementById(\"loginForm\").style.display = \"none\";</script>";
			echo "<table class=\"events\"> <tr> <td>";
			echo "Currently logged in as: ".$_COOKIE["username"];
			echo "</td></tr>";
			echo "<tr><td><form method=\"post\"><input name=\"logoutButton\" type=\"submit\" value=\"Logout\"></form></tr></td>";
			echo "</table>";
		}
		if(isset($_POST["logoutButton"])){
			setcookie("username");
			session_destroy();
			header("Location: index.html");
		}
	?>

	<footer id="signature">
		<p>
			LookUp512 | Designed by David Alvarez, Jack Thielman, and Luis Piña 11/2/20
		</p>
	</footer>
</body>
</html>
