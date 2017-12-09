<?php 

namespace App\Controllers;

class NewsController
{

	private $main;
	public $content;

	public function __construct($main)
	{
		$this->main = $main;
		$this->modelNews = $this->main->loadModel('News');
		
	}

	// public function index()
	// {
	// 	$id = 
	// 	$this->content['courses'] = $this->modelCourses->getById();		
	// 	echo $this->main->twig->render('courses\\index.html', $this->content);
	// }

	public function show(){

		//print_r($this->main->getParams())		;

		$id = isset($this->main->getParams()['table_id']) ? $this->main->getParams()['table_id'] : $this->main->getParams()[1];
		$this->content['news'] = $this->modelNews->getById($id);
		echo $this->main->twig->render('news\\index.html', $this->content);
	}
}