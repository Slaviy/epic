<?php
	/*$path=__dir__;
	include_once($path. "/auth.php");
	$dir = $path .'/data/';
	$list = scandir($dir);
	 	echo "<ul>";
	 foreach ($list as $filename){
	 	$file=$dir.$filename;
	 	if (is_file($file)){
	 		echo "<li>" .file_get_contents($file). "<br> <a href=\"delete.php?file=".$filename."\">Delete</a> <a href=\"edit.php?file=".$filename."\">Edit</a></li>";
	 	}
	 	
	 }
	 echo "</ul>";*/

	 include_once("db.php");
	 $data = getPosts();
	 ?>
	 	<ul>
	 		<?php
	 			foreach($data as $post){
	 				echo "<li>".$post['name']." "."<a href ='remove.php?id=".$post['id']."'>Удалить</a>"." "."<a href ='edit.php?id=".$post['id']."'>Редактировать</a></li>";

	 			}
	 		?>
	 	</ul>

