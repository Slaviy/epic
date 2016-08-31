<?php
abstract class Human
{
	public $name = 'unknown';
	protected $sex;

	public function __construct($name)
	{
		$this->name = $name;
		static::setSex($sex);
	}
	abstract protected function setSex();
	/*{
		if($sex == 'мужик' || $sex == 'девочка'){
			$this->sex = $sex;
		}else{
			echo ' Неверный пол, товарищ!';
			exit();
		}
	}*/


	function greeting()
	{
		echo 'Привет, меня зовут ' . $this->name . '!';
		echo ' Я ' . $this->sex . '!';
	}
}

/*$person = new Human(' Петя');
$person->greeting();*/


class Man extends Human
{
	protected function setSex()
	{
		$this->sex = 'мужик';
	}

	function greeting()
	{
		parent::greeting();
		echo ' И у меня есть борода! ';
	}
}

class Woman extends Human
{
	protected function setSex()
	{
		$this->sex = 'девочка';
	}

	function greeting()
	{
		parent::greeting();
		echo ' И у меня есть грудь!';
	}
}

$personMale = new Man('Петя');
$personMale->greeting();


echo '<br>';
echo '<p>';

$personFemale = new Woman('Маша');
$personFemale->greeting();


echo '<br>';
echo '<p>';

$personMale = new Man('Вася');
$personMale->greeting();
