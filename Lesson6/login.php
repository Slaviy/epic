<?php
	session_start();
	if (is_numeric ($_SESSION['id']))
	{
		header ("Location:read.php");
	}
	
	echo '<form action = "loginprocessing.php" method = "post">';
	echo '<input type = "text" name = "login"/>';
	echo '<input type = "password" name = "pass" />';
	echo '<button>OK</button>';
	echo '</form>';
