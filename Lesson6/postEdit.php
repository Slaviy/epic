<form action="index.php?c=post&a=editSave" method = "post"> 
Текст <input name="name" placeholder="content" value="<?=$post['name'];?>"/> 
<input type = "hidden" name = "id" value="<?=$post['id'];?>"/> 
<input type = "submit" /> 
</form> 
