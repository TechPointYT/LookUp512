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
	<script src="eventDisplay.js"></script>
</head>

<body>

	<div id="title">
		<img src="images/logos/Events.png" alt="logo" width="450" height="200">
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
			</li>i>

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

	<?php
		$id = $_POST['id'];
		$name = $_POST['name'];
		$date = $_POST['date'];
		$desc = $_POST['description'];
		$longDesc = $_POST['longDescription'];
		$img1 = $_POST['imgLink1'];
		$img2 = $_POST['imgLink2'];
		$link = $_POST['link'];
		$creator = $_POST['creator'];
		$email = $_POST['email'];

		if(isset($_COOKIE['username'])&&$_COOKIE['username']==$creator){
			echo 
			"<table>
				<input type='button' id='editButton' value='Edit'>
				<input type='button' id='deleteButton' value='Delete' onclick='deleteEvent($id)'>
			</table>";
		}
		if(!$_SESSION['editMode']){
			echo 
			"<table class='events'>
				<tr><td><h2>Name of event</h2></td></tr>
				<tr><td><p name='nameEvent'>$name</p></td></tr>
				<tr><td><h3>Date</h3></td></tr>
				<tr><td><p name='dateEvent'>$date</p></td></tr>
				<tr><td><h3>Description</h3></td></tr>
				<tr><td><p name='descEvent'>$desc</p></td></tr>
				<tr><td><h3>More Information</h3></td></tr>
				<tr><td><p name='longDescEvent'>$longDesc</p></td></tr>
				<tr><td><h3>Images Links</h3></td></tr>
				<tr><td><img name='imgLink1' src='$img1'></td> <td><img name='imgLink2' src='$img2'></td></tr>
				<tr><td><h3>Link to official event page</h3></td></tr>
				<tr><td><a name='linkEvent' href='$link'>Link</a></td></tr>
				<tr><td><h3>Event Creator</h3></td></tr>
				<tr><td><p name='eventCreator'>$creator</p></td></tr>
				<tr><td><h3>Contact Information</h3></td></tr>
				<tr><td><p name='creatorEmail'>$email</p></td></tr>
			</table>";
		}
		else{
			echo 
			"<form id='eventForm' method='post'>
				<input type='hidden' name='idEvent' value='$id'>
				<table class='events'>
					<tr><td><h2>Name of event</h2></td></tr>
					<tr><td><input type='text' value='$name' name='nameEvent'></td></tr>
					<tr><td><h3>Date</h3></td></tr>
					<tr><td><input type='date' value='$date' name='dateEvent'></td></tr>
					<tr><td><h3>Description</h3></td></tr>
					<tr><td><input type='text' value='$desc' name='descEvent'></td></tr>
					<tr><td><h3>More Information</h3></td></tr>
					<tr><td><input type='text' value='$longDesc' name='longDescEvent'></td></tr>
					<tr><td><h3>Images Links</h3></td></tr>
					<tr><td><input type='text' value='$img1' name='imgLink1'></td> <td><input type='text' value='$img2' name='imgLink2'></td></tr>
					<tr><td><h3>Link to official event page</h3></td></tr>
					<tr><td><input type='text' value='$link' name='linkEvent'></td></tr>
					<tr><td><h3>Event Creator</h3></td></tr>
					<tr><td><input type='text' value='$creator' name='eventCreator'></td></tr>
					<tr><td><h3>Contact Information</h3></td></tr>
					<tr><td><input type='text' value='$email' name='creatorEmail'></td></tr>
					<tr><td><button type='submit' id='doneEdit' name='doneEdit' >Done Editing</button></td></tr>
				</table>
			</form>";
		}
	?>
	<script>
		if($('#editButton').length){
			$('#editButton').click(function(){
				<?php 
					if(isset($_COOKIE['username'])&&$_COOKIE['username']==$creator){
						$_SESSION['editMode'] = TRUE; 
				}?>
				window.location.reload();
			});
		}
	</script>
	
	<footer id="signature">
		<p>
			LookUp512 | Designed by David Alvarez, Jack Thielman, and Luis Piña 11/2/20
		</p>
	</footer>
</body>
</html>
