<?php
	require 'sqlInfo.php';

	$mysqli = new mysqli($sqlServer,$sqlUsername,$sqlPassword,$sqlDatabase);
	if($mysqli->connect_errno){
		die('Connect Error: '.$mysqli->connect_errno.": ".$mysqli->connect_error);
	}
	
	$query = "SELECT * FROM lu512Events;";
	$result = $mysqli->query($query);
	if(!$result){
		die("Query failed: ($mysqli->error <br> SQL command	= $query");
	}
	else{
		foreach(mysqli_fetch_all($result) as $row){
			echo json_encode(array("id"=>$row[0],"name"=>$row[1],"date"=>$row[2],"description"=>$row[3],
			"imgLink1"=>$row[4],"imgLink2"=>$row[5],"link"=>$row[6],"longDescription"=>$row[7],
			"creator"=>$row[8],"email"=>$row[9],));
		}
	}
	
?>