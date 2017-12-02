<?php 

namespace App\Acesso\Controllers;

use App\Acesso\Controllers\LoginController;

class IndexController extends LoginController
{
	

	public function __construct($main)
	{
		parent::auth(TRUE);
	}

	public function index()
	{
		echo "Mostra tela";
	}

}