<?php 
	include_once("db.php"); 
	$post=getPost($_GET['id']) 
?> 

<meta charset="utf-8"> 
<form action="editpost.php" method="post"> 
Текст<input name="data" placeholder="content" value="<?=$post['text'];?>"/> 
<input type="hidden" name="id" value="<?=$post['id'];?>"/> 
<input type="submit" /> 
</form>
