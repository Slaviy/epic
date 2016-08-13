<?php
	include_once("db.php");
	$id = $_GET['id'];
	removePost($id);
	