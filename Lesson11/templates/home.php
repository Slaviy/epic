<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Epic Blog</title>
</head>
<body>
    <ul>
        <?php foreach($messages AS $post): ?>
            <li>
                <?= $post['message'] ?> <br>
                <?=$post['date']/*добавили вывод времени добавления*/?> <br> 
                <a href="index.php?action=messages&method=edit&id=<?= $post['id'] ?>">Редактировать</a>
                <a href="index.php?action=messages&method=delete&id=<?= $post['id'] ?>">Удалить</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=messages&method=add">Добавить сообщение</a>
    <a href="index.php?action=account&method=logout">Выход</a>

    <ul id="pages">
    	<? if($page > 1) :?>
    		<li> <a href="index.php?action=home&method=index&page=<?=$page-1;?>"><</a></li>
    	<?endif;?>

    	<li><?=$page;?></li>

    	<? if($page < $total):?>
    		<li> <a href="index.php?action=home&method=index&page=<?=$page+1;?>">></a></li>
    	<?endif;?>

    </ul>

    <style>
    	#pages{
    		list-style:none;
    	}

    	#pages li{
    		float:left;
    		margin:auto 10px;
    	}

    	#pages a{
    		text-decoration:none;
    	}
    </style>
</body>
</html>
