<?php

namespace MaxBusiness\Controllers;

use MaxBusiness\Models\DB;

class MainController
{

	private $params;
	public $db;
	public $name;
	public $twig;

	public function __construct()
	{		
		$this->db = new DB();
	}
	
	public function setParams($params)
	{
		$this->params = $params;
	}

	public function getParams()
	{
		return $this->params;
	}

	public function configTemplate($folder = NULL)
	{
		if( !$folder ){
			$loader = new \Twig_Loader_Filesystem("app\\Views");
			$this->twig = new \Twig_Environment($loader);
			return;
		}
		$loader = new \Twig_Loader_Filesystem("app\\$folder\\Views");
		$this->twig = new \Twig_Environment($loader);
		return;
	}
}