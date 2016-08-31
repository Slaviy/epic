<?php
	session_start();
	require_once("db.php");
	require_once("helper.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8"/>
		<title>My blog</title>
	</head>
	<body>
		<?=$body;?>
	</body>
</html>
