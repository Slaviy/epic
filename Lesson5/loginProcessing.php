<?php
	require_once ('config.php');
	session_start();
	$login = $_POST['login'];
	$pass = md5($_POST['pass'] . $salt);
	

	$stmt = $db->prepare ("SELECT * FROM `users` WHERE `name` = :login AND `pass` = :pass");
	$stmt -> execute (['login' => $login, 'pass' => $pass]);

	if ($stmt -> rowCount () == 1)
		{
			$user = $stmt->fetch();

			$_SESSION['id'] = $user['id'];
			header ("Location:read.php");
		}
		echo "<b>Login error</b>";		
		