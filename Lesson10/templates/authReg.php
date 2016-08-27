<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Epic Blog</title>
</head>
<body>
    <form action="<?=$action;?>" method="post">
    	<input type="hidden" name="token" value="<?= $token ?>">
		Логин: <input name="login" />
		Пароль: <input type="password" name="pass" />
    	<button type="submit">Вход</button>
    </form>
	
	<p><a href="index.php?action=account&method=register">Регистрация</a></p>
	
	<p>
		<?php
			if(isset($error)) {
				echo '<b>' . $error . '</b>';
			}
		?>
	</p>
</body>
</html>