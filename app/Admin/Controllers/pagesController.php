<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class PagesController extends loginController
{
 		
 	private $main;

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
	}

	public function index()
	{
		echo $this->main->twig->render('\\pages\\index.html', $this->content);
	}

	public function add()
	{
		echo $this->main->twig->render('\\pages\\add.html', $this->content);
	}

	public function edit()
	{
		echo $this->main->twig->render('\\pages\\edit.html', $this->content);
	}

	public function delete()
	{
		echo $this->main->twig->render('\\pages\\delete.html', $this->content);
	}

}