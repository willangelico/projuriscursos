<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class BannersController extends loginController
{
 		
 	private $main;
 	private $model;
 	public $content;

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
		$this->model = $this->main->loadModel('Banners');
	}

	public function index()
	{
		$this->content['list'] = $this->model->getAll();
		echo $this->main->twig->render('\\banners\\index.html', $this->content);
	}

	public function add()
	{
		echo $this->main->twig->render('\\banners\\add.html', $this->content);
	}

	public function edit()
	{
		echo $this->main->twig->render('\\banners\\edit.html', $this->content);
	}

	public function delete()
	{
		echo $this->main->twig->render('\\banners\\delete.html', $this->content);
	}

}