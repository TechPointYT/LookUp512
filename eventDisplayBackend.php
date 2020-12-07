<?php
	if(!isset($_SESSION)){
		session_start();
	}
?>
<?php
	require 'sqlInfo.php';

	$mysqli = new mysqli($sqlServer,$sqlUsername,$sqlPassword,$sqlDatabase);
	if($mysqli->connect_errno){
		die('Connect Error: '.$mysqli->connect_errno.": ".$mysqli->connect_error);
	}

	$id =  mysqli_real_escape_string($mysqli,$_POST['idEvent']);
	$name =  mysqli_real_escape_string($mysqli,$_POST['nameEvent']);
	$date =  mysqli_real_escape_string($mysqli,$_POST['dateEvent']);
	$desc =  mysqli_real_escape_string($mysqli,$_POST['descEvent']);
	$longDesc =  mysqli_real_escape_string($mysqli,$_POST['longDescEvent']);
	$img1 =  mysqli_real_escape_string($mysqli,$_POST['imgLink1']);
	$img2 =  mysqli_real_escape_string($mysqli,$_POST['imgLink2']);
	$link =  mysqli_real_escape_string($mysqli,$_POST['linkEvent']);
	$creator =  mysqli_real_escape_string($mysqli,$_POST['eventCreator']);
	$email =  mysqli_real_escape_string($mysqli,$_POST['creatorEmail']);

	$query = "UPDATE lu512Events 
				SET name='$name', eventDate='$date', dsc='$desc', 
				img1='$img1', img2='$img2', link='$link', 
				longDsc='$longDesc', creator='$creator', email='$email'
				WHERE id=$id;";
	$result = $mysqli->query($query);
	if(!$result){
		die("Query failed: ($mysqli->error <br> SQL command	= $query");
	}
	else{
		$_SESSION['editMode'] = FALSE;
		echo json_encode(array("success" => 1,"msg" => "Update sucessful"));
	}
?>