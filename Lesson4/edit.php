<?php 
	/*$filename=__DIR__ . '/data/'.$_GET['file'];
	$data=file_get_contents($filename);
?>
<meta charset="UTF-8">
<form action="save.php" method="post">
	Текст: <input name="data" value="<?=$data;?>">
		Имя файла: <input name="filename" value="<?=$_GET['file'];?>">
			<input type="submit">
</form>*/
	 
include_once("db.php"); 
$post=getPost($_GET['id']) 
?> 

<meta charset="utf-8"> 
<form action="editpost.php" method="post"> 
Текст<input name="data" placeholder="content" value="<?=$post['text'];?>"/> 
<input type="hidden" name="id" value="<?=$post['id'];?>"/> 
<input type="submit" /> 
</form>
