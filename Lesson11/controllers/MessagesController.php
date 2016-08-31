<?php
namespace Epic\Controllers;
use Epic\Models;

class MessagesController extends BaseController {

	public function add()
	{
			
		$data['token'] = $this->makeToken();
		$this->LoadPage('add',$data);
	}
	
	public function addSave()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->checkToken($_POST['token']))
		{
			$model = new Models\MessagesModel();
			
			$model->addPost($_POST['message']);
			
			$this->redirectToAction("index","home");
		}
	}

	public function edit()
	{
		$model = new Models\MessagesModel();

		$data['post'] = $model->getPost($_GET['id']);
		$data['token'] = $this->makeToken();
		$this->LoadPage('edit',$data);
	}

	public function editSave()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->checkToken($_POST['token']))
		
		{		
			
			$model = new Models\MessagesModel();

			$model->editPost($_POST['id'], $_POST['message']);

			$this->redirectToAction("index","home");
		}

		
	}

	public function delete()
	{
		$model = new Models\MessagesModel();

		$model->deletePost($_GET['id']);

		$this->redirectToAction("index","home");
	}

}
