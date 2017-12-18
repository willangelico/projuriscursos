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
		$this->content['classes'] = $this->model->getAllClassWithCourses();
		echo $this->main->twig->render('\\materials\\filterClasses.html', $this->content);
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

	public function turma()
	{
		$idClass = $this->main->getParams()[0];
		$this->content['materials'] = $this->model->getAllByClass($idClass);
		echo $this->main->twig->render('\\materials\listByClass.html', $this->content);
		
	}

}