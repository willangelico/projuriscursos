<?php 

namespace App\Acesso\Controllers;

use App\Acesso\Controllers\LoginController;

class IndexController extends LoginController
{
	

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