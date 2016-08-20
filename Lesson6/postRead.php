	 	<ul>
	 		<?php
	 			foreach($data as $post)
	 			{
	 				echo "<li>".$post['name']." "."<a href ='index.php?id=".$post['id']." &c=post&a=remove'>Удалить</a>"." "."<a href ='index.php?id=".$post['id']."&c=post&a=edit'>Редактировать</a></li>";

	 			}
	 		?>
	 	</ul>

