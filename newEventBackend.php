<?php
	if(!isset($_SESSION)){
		session_start();
	}
?>

<?php
	require 'sqlInfo.php';

	if(!empty($_POST['nameEvent'])&&isset($_COOKIE['username'])){
		$mysqli = new mysqli($sqlServer,$sqlUsername,$sqlPassword,$sqlDatabase);
		if($mysqli->connect_errno){
			die('Connect Error: '.$mysqli->connect_errno.": ".$mysqli->connect_error);
		}

		$name = mysqli_real_escape_string($mysqli,$_POST['nameEvent']);
		$date = mysqli_real_escape_string($mysqli,$_POST['dateEvent']);
		$desc = mysqli_real_escape_string($mysqli,$_POST['descEvent']);
		$img1 = mysqli_real_escape_string($mysqli,$_POST['imgLink1']);
		$img2 = mysqli_real_escape_string($mysqli,$_POST['imgLink2']);
		$link = mysqli_real_escape_string($mysqli,$_POST['linkEvent']);
		$creator = $_COOKIE["username"];
		if($date==""){
			$date="9999/01/01";
		}

		$message = "Error";
		$query = "INSERT INTO lu512Events(name, eventDate, dsc, img1, img2, link, creator)
					VALUES(\"$name\",\"$date\",\"$desc\",\"$img1\",\"$img2\",\"$link\", \"$creator\")";
		$result = $mysqli->query($query);
		if(!$result){
			die("Query failed: ($mysqli->error <br> SQL command	= $query");
		}
		else{
			$message = "Sucessfully added Event: $name";
			echo json_encode(array("success" => 1, "displayMessage" => $message));
		}
		if($message=="Error"){
			$message = "Error adding Event: $name";
			echo json_encode(array("success" => 2, "displayMessage" => $message));
		}
	}
	else{
		echo json_encode(array("success" => 0));
	}
?>