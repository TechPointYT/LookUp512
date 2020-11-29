<?php
	require 'sqlInfo.php';

	if(!empty($_POST['username'])&&!empty($_POST['password'])){
		$mysqli = new mysqli($sqlServer,$sqlUsername,$sqlPassword,$sqlDatabase);
		if($mysqli->connect_errno){
			die('Connect Error: '.$mysqli->connect_errno.": ".$mysqli->connect_error);
		}
		$u = $_POST['username'];
		$p = $_POST['password'];
		$message = "Error";
		$query = "SELECT * from lu512Login WHERE username = '$u';";
		$result = $mysqli->query($query);
		if(!$result){
			die("Query failed: ($mysqli->error <br> SQL command	= $query");
		}
		else{
			$info = mysqli_fetch_all($result);
			if(!empty($info)){
				$message = "User already registered. Please try a different username.";
				echo json_encode(array("success" => 2, "displayMessage" => $message));
			}
			else{
				$query = "INSERT INTO lu512Login(username, password) VALUES('$u', '$p');";
				if(!mysqli_query($mysqli, $query)){
					echo "Error: ".$query."".mysqli_error($mysqli);
				}
				else{
					$message = "New user registered";
					if(!isset($_SESSION)){
						session_start();
					}
					setcookie("username",$u, time()+3600);
					echo json_encode(array("success" => 1, "displayMessage" => $message));
				}
			}
		}
		if($message=="Error"){
			$message = "Error Registering";
			echo json_encode(array("success" => 2, "displayMessage" => $message));
		}
	}
	else{
		echo json_encode(array("success" => 0));
	}
?>