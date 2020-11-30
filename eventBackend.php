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
			echo json_encode(array("name"=>$row[1],"date"=>$row[2],"description"=>$row[3],"link"=>$row[6]));
		}
	}
	
?>