<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class UsersController extends loginController
{
 		
 	private $main;
 	private $model;
 	public $content;

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
		$this->model = $this->main->loadModel('Users');
	}

	public function index()
	{
		$this->content['list'] = $this->model->getAll();
		echo $this->main->twig->render('\\users\\index.html', $this->content);
	}

	public function add()
	{
		echo $this->main->twig->render('\\users\\add.html', $this->content);
	}

	public function edit()
	{
		echo $this->main->twig->render('\\users\\edit.html', $this->content);
	}

	public function delete()
	{
		echo $this->main->twig->render('\\users\\delete.html', $this->content);
	}

}