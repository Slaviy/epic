<?php
	require_once ('config.php');
	session_start();
	$login = $_POST['login'];
	$pass = md5($_POST['pass'] . $salt);

	$stmt = $db->prepare("INSERT INTO `users` (`name`,`pass`) VALUES (:login,:pass)");
	$stmt -> execute(['login' => $login, 'pass' => $pass]);
	$id = $db->lastInsertId();

	$_SESSION['id'] = $id;
header("Location:read.php");
