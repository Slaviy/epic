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

		$page = isset($_GET['page']) ? $_GET['page'] : 1;

		$data['page'] = $page;
		$data['total'] = $model->getMassagesCount();
		$data['messages'] = $model->getAllMessages($page);
		$this->LoadPage('home',$data);
	}
}
