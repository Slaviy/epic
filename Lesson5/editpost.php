<?php 
include_once("db.php"); 
updatePost($_POST['id'],$_POST['data']); 
header('Location:read.php');