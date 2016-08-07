<?php
	$path=__dir__.'/data/'. $_GET['file'];
	unlink($path);
	header('Location:read.php');