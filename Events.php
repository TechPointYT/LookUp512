<?php
	if(!isset($_SESSION)){
		session_start();
		$_SESSION['editMode'] = FALSE;
	}
?>

<html lang ="en">

<head>
	<title>Events - LookUp512</title>
	<meta charset="UTF-8">
	<meta name="description" content="Events in Austin">
	<meta name="author" content="Luis Piña, David Alvarez, Jack Thielman">
	<link rel="stylesheet" type="text/css" href="LookUp512.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="events.js"> </script>
	<link rel="stylesheet" type="text/css" href="events.css">
</head>

<body>
	

	<div id="logoContainer" class="container">
		<a href="index.html"> <img id="logo" width="30" height="30" src="images\logos\logo.png" alt="Logo"> </a>
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
	
	<div class="content">
		<div class="container2">
			<div class="highlight" id="highlight">
				<h2>Highlighted Event</h2>

				<center>
					<?php
						if(isset($_COOKIE['username'])){
							echo "<a href=\"newEvent.html\">";
							echo "<button id=\"newEvent\" name=\"newEvent\">Add New Event</button>";
							echo "</a>";
						}
					?>
				</center>

			</div>
			<h2>Events</h2>
			<div class="container3">
			<div class="columns">

			</div>
			</div>

		</div>
		
	</div>

	<footer id="signature">
		<p>
			LookUp512 | Designed by David Alvarez, Jack Thielman, and Luis Piña 11/2/20
		</p>
	</footer>
</body>
</html>
