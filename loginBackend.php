<?php
	require 'sqlInfo.php';

	if(!empty($_POST['username'])&&!empty($_POST['password'])){
		$mysqli = new mysqli($sqlServer,$sqlUsername,$sqlPassword,$sqlDatabase);
		if($mysqli->connect_errno){
			die('Connect Error: '.$mysqli->connect_errno.": ".$mysqli->connect_error);
		}
		$u = mysqli_real_escape_string($mysqli,$_POST['username']);
		$p = mysqli_real_escape_string($mysqli,$_POST['password']);
		$message = "Error";
		$query = "SELECT * from lu512Login WHERE username = '$u';";
		$result = $mysqli->query($query);
		if(!$result){
			die("Query failed: ($mysqli->error <br> SQL command	= $query");
		}
		else{
			$info = mysqli_fetch_all($result);
			if(!empty($info)){
				if($info[0][2]==$p){
					$message = "User and password confirmed";
					if(!isset($_SESSION)){
						session_start();
					}
					setcookie("username",$u, time()+86400);
					echo json_encode(array("success" => 1, "displayMessage" => $message));
				}
			}
		}
		if($message=="Error"){
			$message = "Incorrect username or password";
			echo json_encode(array("success" => 2, "displayMessage" => $message));
		}
	}
	else{
		echo json_encode(array("success" => 0));
	}
?>