<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class UsersController extends loginController
{
 		
 	private $main;

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
	}

	public function index()
	{
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