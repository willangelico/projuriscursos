<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class EventsController extends loginController
{
 		
 	private $main;
 	private $model;
 	public $content = array();

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
		$this->model = $this->main->loadModel('Events');
		
	}

	public function index()
	{		
		$this->content['events'] = $this->model->getAll();
		echo $this->main->twig->render('\\events\\index.html', $this->content);
	}

	public function add()
	{		
		echo $this->main->twig->render('\\events\\add.html', $this->content);
	}

	public function edit()
	{
		echo $this->main->twig->render('\\events\\edit.html', $this->content);
	}

	public function delete()
	{
		echo $this->main->twig->render('\\events\\delete.html', $this->content);
	}

	public function upload()
	{
		echo "novo-nome-999";
	}
}