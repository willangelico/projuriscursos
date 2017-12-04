<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class MaterialsController extends loginController
{
 		
 	private $main;
 	private $model;
 	public $content;

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
		$this->model = $this->main->loadModel('Materials');
	}

	public function index()
	{
		$this->content['list'] = $this->model->getAll();
		echo $this->main->twig->render('\\materials\\index.html', $this->content);
	}

	public function add()
	{
		echo $this->main->twig->render('\\materials\\add.html', $this->content);
	}

	public function edit()
	{
		echo $this->main->twig->render('\\materials\\edit.html', $this->content);
	}

	public function delete()
	{
		echo $this->main->twig->render('\\materials\\delete.html', $this->content);
	}

}