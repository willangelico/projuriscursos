<?php 

namespace App\Acesso\Controllers;

use App\Acesso\Controllers\LoginController;

class MateriaisController extends LoginController
{
	

	public function __construct($main)
	{
		parent::auth(TRUE);
		$this->main = $main;
		$this->model = $this->main->loadModel('Materials');
		$this->idStudent = $_SESSION['userdata']['id'];
	}

	public function index()
	{				
		$this->content['list'] = $this->model->getMaterialByStudent($this->idStudent,1);		
		echo $this->main->twig->render('\\materiais\\index.html', $this->content);
	}

}