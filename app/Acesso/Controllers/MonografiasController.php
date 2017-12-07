<?php 

namespace App\Acesso\Controllers;

use App\Acesso\Controllers\LoginController;

class MonografiasController extends LoginController
{
	

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
	}

	public function index()
	{
		// busca materiais do aluno
		echo $this->main->twig->render('\\monografias\\index.html', $this->content);
	}

}