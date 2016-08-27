<?php
namespace Epic\Controllers;
use Epic\Models;

class HomeController extends BaseController {

	public function __construct()
	{
		$model = new Models\AccountModel();
		
		if(!$model->isAuthed()) {
			$this->redirectToAction('index','account');
		}
	}

	public function index()
	{
		$model = new Models\MessagesModel();
		
		$data['messages'] = $model->getAllMessages();
		$this->LoadPage('home',$data);
	}
}
