<?php
namespace Epic\Models;



class MessagesModel extends BaseModel{

private $postPerList = 5;

	public function getMassagesCount()
	{
		$db = $this->connection();
		$result = $db->query("SELECT COUNT(*) as  `count` FROM `messages`");
		$r = $result->fetchAll();

		return ceil ($r[0]['count'] / $this->postPerList);
	}

	public function getAllMessages($page = 1, $limit = '0')
	{

		$page = ($page < 1) ? 1:$page;
		$limitStart = ($page-1) * $this->postPerList;
		$limit = $limitStart . "," . $this->postPerList;
		$db = $this->connection();
		$result = $db->query("SELECT * FROM `messages` LIMIT {$limit}");
		return $result->fetchAll();
	}

	/*public function getAllMessages($limit = '0')
	{
		$db = $this->connection();
		$query = "SELECT * FROM `messages`";
		if($limit !== '0') {
			$query .= " LIMIT {$limit} ";
		}
		
		$result = $db->query($query);
		return $result -> fetchAll();
	}*/
	
	public function addPost($text)
	{
		$db = $this->connection();
		$query = "INSERT INTO `messages` SET `message` = :message, `date`= NOW()";
		$stmt = $db->prepare($query);
		$stmt->execute(['message' => $text]);
		return $db->lastInsertId();
	}

	public function getPost($id)
	{
		$db = $this->connection();
		$query = "SELECT * FROM `messages` WHERE `id`=:id";
		$stmt = $db->prepare($query);
		$stmt->execute(['id' => $_GET['id'] ]);
		return $stmt->fetch();

			echo template('templates/edit.php', [
    		'token' => makeToken(),
    		'post' => $data
			]);
	}



	public function editPost($id,$text)
	{
	$db = $this->connection();
	$query = "UPDATE `messages` SET `message`=:message WHERE `id`=:id";
	$stmt = $db->prepare($query);
	$stmt->execute(['message' => $text, 'id' => $id]);
	}

	public function deletePost($id)
	{
		$db = $this->connection();
		$query = "DELETE FROM `messages` WHERE `id`=:id";
		$stmt = $db->prepare($query);
		$stmt->execute(['id' => $id]);
	}
}
