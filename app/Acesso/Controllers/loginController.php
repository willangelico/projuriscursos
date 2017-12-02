<?php

namespace App\Acesso\Controllers;

use MaxBusiness\Controllers\AuthController;


class LoginController extends AuthController
{
	private $table = 'students';
	private $folder = 'acesso';
	private $accessField = 'login';
	public $body_class = 'login-forms';
	public $title = NAME;
	public $content = array();

	public function __construct($main)
	{

		$this->main = $main;		
		$this->content['login_error'] = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
	}

	public function auth($auth)
	{
		if($auth){
			parent::__construct($this->table, $this->folder, $this->accessField);
		}
	}

	public function show()
	{
		echo $this->main->twig->render('\\login\\index.html', $this->content);	
	}
}