<?php
namespace Epic\Models;
	class AccountModel extends BaseModel{
		
		private $salt = "dfggcvbbv00";

	public function isAuthed()
	{
		if(!isset($_SESSION['user_id'])) {
			return false;
		}
		
		$userId = $_SESSION['user_id'];
		
		$user = $this->getUserById($userId);
		if($user === false) {
			return false;
		}
		
		return true;
	}
	

		public function getUserById($id)
	{
		$db = $this->connection();
		$user = $db->prepare("SELECT * FROM `users` WHERE `id` = :id");
		$user->execute(['id' => $id]);
		
		if($user->rowCount() == 1) {
			return $user->fetch();
		}
		
		return false;
	}
	
	public function getUserByLoginPassword($login,$password)
	{

		$db = $this->connection();
		$user = $db->prepare("SELECT * FROM `users` WHERE `name` = :login AND `pass` = :password");
		$user->execute(['login' => $login, 'password' => $this->hashPassword($password)]);
		
		if($user->rowCount() == 1) {
			return $user->fetch();
		}
		
		return false;
	}
	
	public function getUserByLogin($login)
	{
		
		$db = $this->connection();
		$user = $db->prepare("SELECT * FROM `users` WHERE `name` = :login");
		$user->execute(['login' => $login]);
		
		return $user->rowCount();
	}
	
	private function hashPassword($pass) 
	{
		return md5($pass . $this->salt);
	}
	
	public function registerUser($login,$password)
	{

		$db = $this->connection();
		$user = $db->prepare("INSERT INTO `users` (`name`,`pass`) VALUES (:login, :password)");
		$user->execute(['login' => $login, 'password' => $this->hashPassword($password)]);
		
		return $db->lastInsertId();
	}
}
