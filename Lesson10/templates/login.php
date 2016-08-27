<?php
	echo '<form action = "index.php?action=account&method=login" method = "post">';
	echo '<label> <input type="hidden" name="token" value="' . $token . '"> Логин: </label>';
	echo '<label> <input type = "text" name = "login"/> Пароль: </label>';
	echo '<input type = "password" name = "pass" /> ';
	echo '<button>OK</button>';
	echo '</form>';
?>
	<a href="index.php?action=account&method=register">Регистрация</a>