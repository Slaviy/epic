<?php
	$name=$_POST['name'];
	$bithday=strtotime($_POST['birthday']);
	$today=time();

	$diff=$today-$birthday;

	result-round(diff/60/60/24)."days";
		
		echo $name . "it's".$result."from your birthday now";