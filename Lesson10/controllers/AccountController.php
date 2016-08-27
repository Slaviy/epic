<?php
namespace Epic\Controllers;
use Epic\Models;

	class AccountController extends
		BaseController{
			public function index()
			{
				$model = new Models\AccountModel();

				if($model->isAuthed() === true){
					$this->redirectToAction('index','home');
				}

				$data['token'] = $this->makeToken();
				$this->LoadPage('login', $data);
			}

	public function login() 
	{
		$model = new Models\AccountModel();
		
		if($user = $model->getUserByLoginPassword($_POST['login'],$_POST['pass'])) 
		{
			$_SESSION['user_id'] = $user['id'];
			$this->redirectToAction('index','home');
		}
		
		$data['token'] = $this->makeToken();
		$data['error'] = 'Неверный логин или пароль';
		$data['action'] = 'index.php?action=account&method=login';
		$this->LoadPage('authReg',$data);
	}
	
	public function register()
	{
		$data['token'] = $this->makeToken();
		$data['action'] = 'index.php?action=account&method=regSave';
		$this->LoadPage('authReg',$data);
	}
	
	public function regSave()
	{
		$model = new Models\AccountModel();
			
		if($model->getUserByLogin($_POST['login']) > 0) {
			$this->redirectToAction('register','account');
		}
		else
		{
			if($id = $model->registerUser($_POST['login'],$_POST['pass']))
			{
				$_SESSION['user_id'] = $id;
				$this->redirectToAction('index','home');
			}
			
			$data['token'] = $this->makeToken();
			$data['action'] = 'index.php?action=account&method=regSave';
			$data['error'] = 'Error';
			$this->LoadPage('authReg',$data);
		}
	}
	
	public function logout()
	{
		unset($_SESSION['user_id']);
		$this->redirectToAction('index','account');
	}
}
