<?php 

namespace App\Controllers;

class CoursesController
{

	private $main;
	public $content;

	public function __construct($main)
	{
		$this->main = $main;
		$this->modelCourses = $this->main->loadModel('Courses');
		
	}

	// public function index()
	// {
	// 	$id = 
	// 	$this->content['courses'] = $this->modelCourses->getById();		
	// 	echo $this->main->twig->render('courses\\index.html', $this->content);
	// }

	public function show(){
		$id = $this->main->getParams()['table_id'];
		$this->content['course'] = $this->modelCourses->getById($id);
		echo $this->main->twig->render('courses\\index.html', $this->content);
	}
}