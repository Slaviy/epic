<?php 
	$filename=__DIR__ . '/data/'.$_GET['file'];
	$data=file_get_contents($filename);
?>
<meta charset="UTF-8">
<form action="save.php" method="post">
	Текст: <input name="data" value="<?=$data;?>">
		Имя файла: <input name="filename" value="<?=$_GET['file'];?>">
			<input type="submit">
</form>
