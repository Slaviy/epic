<?php
	session_start();
	require_once('db.php');
	require_once('helper.php');

	//Routing
	//http://domain.com/index.php?c=post&a=read

	$controller =$_GET['c'];
	$action = $_GET['a'];

	switch($controller){
		case 'post':
			switch ($action){
				case 'add':
					postAdd();
					break;
				case 'addSave':
					postAddSave();
					break;
				case 'read':
					postRead();
					break;
				case 'remove':
					postRemove();
					break;
				case 'edit':
					postEdit();
					break;
				case 'editSave':
					postEditSave();
					break;

			}
			break;
		default;
			index();
			break;
	}

	function postAdd(){
		echo template("template.php",[
			'body' => template("postAdd.php",[
				'_aft' => makeToken()
			])
		]);
	}

	function index(){
		postAdd;
	}
 

  	function postAddSave()
  	{	
  		if(checkToken()){
  			if(db_addPost($_POST['text'])){
  				index();
  			}
  			else {
  				errorPage(__FUNCTION__);
  			}

  			}
  		else {
  			errorPage(__FUNCTION__ . "token");
  		}
  		
  	}

  	function postRead()
  	{
  		echo template ("template.php", [
  			'body'=> template("postRead.php",[
  			'data'=>getPosts()
  			])
  		]);
  	}

  	function postRemove()
  	{
  		$id = $_GET['id'];
		removePost($id);
		postRead();
	
  	}

  	function postEdit()
  	{
  		echo template ("template.php", [
  			'body' => template ("postEdit.php", [
  			'post' => getPost($_GET['id'])
  			])
  		]);
  	}
  	function postEditSave()
  	{
  		updatePost($_POST['id'],$_POST['name']);
  		postread();
  	}
?>