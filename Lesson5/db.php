<?php
	include_once("config.php");
	

	function addPost ($text){
		global $db;
		$stmt = $db->prepare("INSERT INTO `MESSAGES` SET name = :name");
		$stmt->execute ([':name' => $text]);
		$stmt->errorCode()[0]; //00000 - OK
	}

	function getPosts(){
		global $db;
		$result = $db->query("SELECT * FROM `MESSAGES`");
		$data =[];
		while ($row = $result ->fetch())
		{
				$data[] = $row;
		}

		return $data;
	}

	function getPost($id) {

		global $db;
		$stmt = $db->prepare("SELECT * FROM `MESSAGES` WHERE id = :id");
		$stmt->execute ([':id'=> $id]);
		if ($stmt->errorCode()[0] == NULL) 
		{ 
		return $result ->fetch(); 
		} 
		return false; 

	}

	function removePost ($id){
		global $db;
			$db->query ("DELETE FROM `MESSAGES` WHERE `id` = " . $id);
			return ($mysqli->error == NULL);
	}

	function updatePost($id,$text) 
	{ 
	global $db; 
	$stmt = $db->prepare("UPDATE `messages` SET `name` = :name WHERE `id`=:id"); 
	$stmt -> execute (['id' => $id, 'name'=>$text]); 
	return ($stmt->errorCode () [0] == "00000"); 
	}
	