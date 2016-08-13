<?php
	include_once("config.php");
	

	function addPost ($text){
		$db=connection();
		$stmt = $db->prepare("INSERT INTO `MESSAGES` SET name = :name");
		$stmt->execute ([':name' => $text]);
		$stmt->errorCode()[0]; //00000 - OK
	}

	function getPosts(){
		$db = connection();		
		$result = $db->query("SELECT * FROM `MESSAGES`");
		$data =[];
		while ($row = $result ->fetch())
		{
				$data[] = $row;
		}

		return $data;
	}

	function getPost($id) {

		$db=connection();		
		$stmt = $db->prepare("SELECT * FROM `MESSAGES` WHERE id = :id");
		$stmt->execute ([':id'=> $id]);
		if ($stmt->errorCode()[0] == "00000") 
		{ 
		return $stmt ->fetch(); 
		} 
		return false; 

	}

	function removePost ($id){
		$db=connection();			
		$db->query ("DELETE FROM `MESSAGES` WHERE `id` = " . $id);
			return true;
	}

	function updatePost($id,$text) 
	{ 
	$db=connection();
	$stmt = $db->prepare("UPDATE `messages` SET `name` = :name WHERE `id`=:id"); 
	$stmt -> execute (['id' => $id, 'name'=>$text]); 
	return ($stmt->errorCode () [0] == "00000"); 
	}