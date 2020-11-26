<?php

	// Optionally store the parameters in variables
	$server = "fall-2020.cs.utexas.edu";
	$user = "cs329e_bulko_lpin3397";
	$pwd = "canada2Betray2Cervix";
	$dbName = "cs329e_bulko_lpin3397";
	$mysqli = new mysqli ($server,$user,$pwd,$dbName);
	// If it returns a non-zero error number, print a
	// message and stop execution immediately
	if ($mysqli->connect_errno) {
		die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
	}

	// Create the query as a string
	$command = "SELECT * FROM patrons WHERE
	lastName = \"Eilish\"";
	// Issue the query
	$result = $mysqli->query($command);
	// Verify the result
	if (!$result) {
		die("Query failed: ($mysqli->error <br> SQL command = $command");
	}

?>