<?php	
	require 'namespace_one.php';
	require 'namespace_two.php';

	function hello(){
	return "Hello!";
	}

		echo hello();
		echo Epic1\hello();
		echo Epic2\hello();
