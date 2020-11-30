<?php
	require 'sqlInfo.php';

	$mysqli = new mysqli($sqlServer,$sqlUsername,$sqlPassword,$sqlDatabase);
	if($mysqli->connect_errno){
		die('Connect Error: '.$mysqli->connect_errno.": ".$mysqli->connect_error);
	}
	
	$query = "SELECT * FROM lu512Parks;";
	$result = $mysqli->query($query);
	if(!$result){
		die("Query failed: ($mysqli->error <br> SQL command	= $query");
	}
	else{
		foreach(mysqli_fetch_all($result) as $row){
			echo json_encode(array("name"=>$row[1],"times"=>$row[2],"address"=>$row[3],"size"=>$row[4],"amenities"=>$row[5]));
		}
	}
	
?>