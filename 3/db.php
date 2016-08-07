<?php
/*$mysqli = new mysqli("localhost", "root", "", "epic");
	if (mysqli_connect_errno()){
		echo "Connect failed: ".mysqli_connect_error();
		exit();
	}

	/*if(!$result = $mysqli->query("INSERT INTO `MESSAGES` (`name`) VALUES ('my second query')")) {
		echo "Error on line" . __LINE__ . ": " . $mysqli->error;
		exit;
	}*/

	/*if(!$result = $mysqli->query("SELECT * FROM `MESSAGES`")) {
		echo "Error on line" . __LINE__ . ": " . $mysqli->error;
		exit;
	}
	while ($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		var_dump($row);
	}*/

	function addPost ($text){
		$mysqli = new mysqli ("localhost", "root", "", "EPIC");
		$mysqli->query("INSERT INTO `MESSAGEs` (`text`) VALUES ($text)");
		return ($mysqli->error == NULL);
	}