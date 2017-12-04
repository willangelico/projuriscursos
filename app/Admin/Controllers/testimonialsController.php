<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class TestimonialsController extends loginController
{
 		
 	private $main;
 	private $model;
 	public $content;

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
		$this->model = $this->main->loadModel('Testimonials');
	}

	public function index()
	{
		$this->content['list'] = $this->model->getAll();
		echo $this->main->twig->render('\\testimonials\\index.html', $this->content);
	}

	public function add()
	{
		echo $this->main->twig->render('\\testimonials\\add.html', $this->content);
	}

	public function edit()
	{
		echo $this->main->twig->render('\\testimonials\\edit.html', $this->content);
	}

	public function delete()
	{
		echo $this->main->twig->render('\\testimonials\\delete.html', $this->content);
	}

}