<?php
	require 'sqlInfo.php';

	if(!empty($_POST['nameEvent'])){
		$mysqli = new mysqli($sqlServer,$sqlUsername,$sqlPassword,$sqlDatabase);
		if($mysqli->connect_errno){
			die('Connect Error: '.$mysqli->connect_errno.": ".$mysqli->connect_error);
		}

		$name = $_POST['nameEvent'];
		$date = $_POST['dateEvent'];
		$desc = $_POST['descEvent'];
		$img1 = $_POST['imgLink1Event'];
		$img2 = $_POST['imgLink2Event'];
		$link = $_POST['linkEvent'];

		$message = "Error";
		$query = "INSERT INTO lu512Events(name, eventDate, dsc, img1, img2, link)
					VALUES(\"$name\",\"$date\",\"$desc\",\"$img1\",\"$img2\",\"$link\")";
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