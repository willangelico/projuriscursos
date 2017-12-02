<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class NewslettersController extends loginController
{
 		
 	private $main;

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
	}

	public function index()
	{
		echo $this->main->twig->render('\\newsletters\\index.html', $this->content);
	}

	public function add()
	{
		echo $this->main->twig->render('\\newsletters\\add.html', $this->content);
	}

	public function edit()
	{
		echo $this->main->twig->render('\\newsletters\\edit.html', $this->content);
	}

	public function delete()
	{
		echo $this->main->twig->render('\\newsletters\\delete.html', $this->content);
	}

}