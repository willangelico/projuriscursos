<?php 

namespace App\Controllers;

class IndexController
{

	private $main;
	public $content;

	public function __construct($main)
	{
		$this->main = $main;
		$this->modelNews = $this->main->loadModel('News');
		$this->modelCourses = $this->main->loadModel('Courses');
	}

	public function index()
	{
		$this->content['title'] = "Projuris Cursos - Estudos Jurídicos";
		$this->content['courses'] = $this->modelCourses->getAll(0);
		$this->content['news'] = $this->modelNews->getAll(0);	
		echo $this->main->twig->render('\\index\\index.html', $this->content);
	}
}