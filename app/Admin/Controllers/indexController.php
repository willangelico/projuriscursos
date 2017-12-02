<?php 

namespace App\Admin\Controllers;

use App\Admin\Controllers\LoginController;

class IndexController extends LoginController
{
	private $main;

	public function __construct($main)
	{		
		parent::auth(TRUE);
		$this->main = $main;
	}

	public function index()
	{
		echo $this->main->twig->render('\\index\\index.html', $this->content);
	}

}