<?php
abstract class User
{
		protected $login;
		protected $password;
	

	public function __construct($login, $password)
	{
		$this->login = $login;
		static::setPassword($password);
	}

	abstract protected function setPassword($password);
	
	function greeting()
	{
		echo $login;
	}	
	
}

class Admin extends User
{
	protected function setPassword($password)
	{
	if (password == '12345'){
		$this->password = $password;
	}else{
		echo 'Неверный пароль';
	}

}
}
	
$Admin= new Admin('slaviy', '12345');
