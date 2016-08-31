<?php
class MyFirstClass
{
	public $someProp;

	function myMethod()
	{
		echo 'Hello!';
	}
/*function setProp($myProp)*/
}

$myObject = new MyFirstClass();
$myObject->someProp = 'Vasya';
$myObject->myMethod();
