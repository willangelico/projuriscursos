<?php

namespace MaxBusiness\Controllers;

use MaxBusiness\Controllers\MainController;

class SeoController extends MainController
{	
	private $helpers;

	/**
	 * Definições, Controllers e parametros para o SEO
	 * @access public
  	 * @param object $helpers [Funções auxiliares]
	*/
	public function __construct($helpers)
	{
		parent::__construct();
		//Instacia de funções auxiliares
		$this->helpers = $helpers;
	}	

	/**
	 * Verifica se o termo é uma url amigável
	 * @access public
  	 * @param string $term [Termo na Url que não é um controller]
   	 * @param string $folder [Pasta na Url, nulo permitido]
	*/
	public function isFriendlyUrl($folder = "", $term)
	{		
		// seta a variável sqlFolder
		$sqlFolder = "";
		// Verifica se há uma pasta, se sim configura a variavel para a consultar 
		if($folder){
			$sqlFolder = 'and folder = "'.stripslashes($folder).'"';
		}
		// Monta a query de consulta
		$query = "SELECT * FROM `friendly_url` WHERE url = ? {$sqlFolder}";	
		// Envia os dados
		$res = $this->db->query($query,array($term));
		// Se não retornar resultado, retorna FALSE
		if(!$res){
			return FALSE;
		}
		// Retorna conjunto de dados
		return $res->fetchAll();
	}
}