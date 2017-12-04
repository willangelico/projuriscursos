<?php 

namespace App\Controllers;

class IndexController
{

	private $main;
	public $content;

	public function __construct($main)
	{
		$this->main = $main;

	}

	public function index()
	{
		$this->content['title'] = "Projuris Cursos - Estudos Jurídicos";
		echo $this->main->twig->render('\\index\\index.html', $this->content);
	}
}