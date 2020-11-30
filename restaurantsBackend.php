<?php
	require 'sqlInfo.php';

	$mysqli = new mysqli($sqlServer,$sqlUsername,$sqlPassword,$sqlDatabase);
	if($mysqli->connect_errno){
		die('Connect Error: '.$mysqli->connect_errno.": ".$mysqli->connect_error);
	}
	
	$query = "SELECT * FROM lu512Restaurants;";
	$result = $mysqli->query($query);
	if(!$result){
		die("Query failed: ($mysqli->error <br> SQL command	= $query");
	}
	else{
		foreach(mysqli_fetch_all($result) as $row){
			echo json_encode(array("name"=>$row[1],"type"=>$row[2],"desc"=>$row[3],"address"=>$row[4],"phone"=>$row[5],"link"=>$row[6]));
		}
	}
	
?>