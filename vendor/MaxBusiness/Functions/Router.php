<?php

namespace MaxBusiness\Functions;

use MaxBusiness\Controllers\MainController;
use MaxBusiness\Controllers\SeoController;

class Router extends MainController
{

	private $helpers;
	private $folder;
	private $controller;
	private $action;
	private $params;
	public $name;

	/**
	 * Rotas da Url	
	 * @access public
  	 * @param object $helpers [Funções auxiliares]
	*/
	public function __construct($helpers)
	{
		// Chama Construtor da classe extendida
		parent::__construct();	
		//Instacia de funções auxiliares
		$this->helpers = $helpers;	
		// Chama os controllers e models 
		$this->run($this->getUrl());	
	}

	/**
	 * Trata a requisição da Url, verifica se existe algum Alias para ela e retorna um array 
	 * @access private
	 * @return array [Frações da Url, Controllers e Parametros]	 
	*/
	private function getUrl()
	{		
		// Pega a url
		$urlParse = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);		
		// Transforma a Url em array		
		$urlToArray = $this->urlToArray( $urlParse );
		//retorna a url em array
		return $urlToArray;
	}	

	/**
	 * Transforma a Url em array
	 * @access public
	 * @param string $url
	 * @return array [Frações da Url, Controllers e Parametros]
	*/
	public function urlToArray($url)
	{
		// Transforma Url em Array
		$urlArray = preg_split('[/]', $url, -1, PREG_SPLIT_NO_EMPTY);
		// Pega as pastas do sistema definido em config.php
		$folders = explode('|',FOLDERS);
		// Configura os arquivos de controllers pelas pastas
		if( !in_array($this->helpers->checkArray($urlArray,0), $folders) ){
			/* Se posição 0(zero) não tiver o mesmo nome de pasta
			 do config.php insere posição 0 no array com valor NULL */
			array_unshift($urlArray, NULL);		
		}
		return $urlArray;
	}

	/**
	 * Chama o Controller a Ação e os Parametros
	 * @access private
	 * @param array $url [Frações da Url, Controllers e Parametros]
	*/
	private function run($url)
	{		
		// Se posição 0(zero) não for vazio 
		$this->folder = $this->helpers->checkArray($url,0);
		// Seta Controller
		$this->controller 	= $this->helpers->checkArray( $url, 1);		
		if( is_null( $this->controller ) ) : $this->controller = "index"; endif;
		// Seta Action
		$this->action 		= $this->helpers->checkArray( $url, 2);
		if( is_null( $this->action ) ) : $this->action = "index"; endif;
		// Seta parametros
		$this->params 		= array_slice($url, 3); 
		
		// Namespace da classe		
		// Inclui pasta (se houver) no  namespace
		if( $this->folder ){
			$this->folder = ucfirst($this->folder)."\\";
		}
		// Define namespace da classe
		$class = APP_NAMESPACE.$this->folder."Controllers\\".ucfirst($this->controller)."Controller";

		// Verifica se a classe não existe
		if ( !class_exists($class)) { 
			// Carrega a classe Seo
			$seo = new SeoController($this->helpers);
			// Verifica se é uma url amigável
			$isFriendlyUrl = $seo->isFriendlyUrl($this->folder,$this->controller);
			// Se a Url não existe retorna erro 404
			if(!$isFriendlyUrl){
				header("HTTP/1.0 404 Not Found");
				include "app/Views/errors/404.html";
				die();
			}
			// Seta o Controller correto
			$this->controller = $isFriendlyUrl[0]['table_name'];
			$this->params = $isFriendlyUrl[0];
			// redefine a classe
			$class = APP_NAMESPACE.$this->folder."Controllers\\".ucfirst($this->controller)."Controller";
		}

		if( !method_exists($class, $this->action) ){
			// Define Action 
			$this->action = 'show';
			// Redefine parâmetros
			$this->params 	= !$this->params ? array_slice($url, 1) : $this->params; 
		}
		
		// Instancia a classe controladora
		$controller = new $class($this->configParams());

		// Seta a ação
		$action = $this->action;

		// Chama a função
		$controller->$action();
		die();


		echo "<br />pasta: ".$this->folder;
		echo "<br />controller: ".$this->controller;
		echo "<br />action: ".$this->action;
		echo "<br />params: ";
		print_r($this->params);
		echo "<br />";

	}

	public function configParams()
	{
		$main = new MainController();
		$main->setParams($this->params);
		$main->configtemplate($this->folder);
		return $main;
	}
}