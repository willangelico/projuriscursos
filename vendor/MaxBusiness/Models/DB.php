<?php

namespace MaxBusiness\Models;

use PDO;

class DB
{
	public $host,
			$dbName,
			$dbUser,
			$dbPass,			
			$dbCharset,
			$pdo,
			$error,
			$debug,
			$lastId;

	/**
	 * Propriedades e Conexão com o Banco de Dados
	 * @access public
  	 * @param array $dbProps [host, dbName, dbUser, dbPass, dbCharset, debug]
	*/
	public function __construct($dbProps = NULL)
	{	

		// Define as propriedades da Conexão
		$this->host 		= $this->checkProps( $dbProps['host'], DB_HOST );
		$this->dbName 		= $this->checkProps( $dbProps['dbName'], DB_NAME );
		$this->dbUser 		= $this->checkProps( $dbProps['dbUser'], DB_USER );
		$this->dbPass 		= $this->checkProps( $dbProps['dbPass'], DB_PASSWORD );
		$this->dbCharset 	= $this->checkProps( $dbProps['dbCharset'], DB_CHARSET);
		$this->debug 		= $this->checkProps( $dbProps['debug'], DEBUG );

		// Conecta
		$this->connect();

	} // __construct()

	/**
	 * Checa as propriedades da conexao, e seta o defaut se for null
	 * @access private
  	 * @param string $dbProps
  	 * @param string $configProp [constante do config.php]
  	 * @return string [propriedade correta]
	*/
	private function checkProps($dbProp, $configProp)
	{
		// Checa se a Propriedade é nula, se for seta valor Default do config.php
		return is_null( $dbProp ) ? $configProp : $dbProp;
	} // checkProps()

	/**
	 * Conecta com o Banco de Dados
	 * @access protected
	*/
	final protected function connect()
	{
		// Configura variável de conexão
		$pdoConfig = "mysql:host={$this->host}; dbname={$this->dbName}; charset={$this->dbCharset}";


		// Configura opções de charset
		$pdoOptions = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$this->dbCharset}"
		);
	
		// Tenta conectar
		try{

			// Instancia o PDO
			$this->pdo = new PDO(
				$pdoConfig,
				$this->dbUser,
				$this->dbPass,
				$pdoOptions
			);

			// Insere Atributos de debug, se necessário
			$this->isDebug();
			

		} catch ( PDOException $e ){
			echo $this->debugMessage($e);
			die();
		}
	} // connect()

	/**
	 * Atributos do PDO para modo debug
	 * @access private
	*/
	private function isDebug()
	{
		// Se debug for true, seta atributos de debug no PDO
		if( $this->debug ){
			$this->pdo->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_WARNING
			);
		}
	} // isDebug()

	/**
	 * Mostra mensagem de erro de conexão no modo debug
	 * @access private
  	 * @param string $e [PDOException]
  	 * @return  string [Mensagem de Erro de conexão com o Banco de Dados]
	*/
	private function debugMessage($e)
	{
		// Se debug for true, mostra mensagem da Exception do PDO
		if( $this->debug ){
			return 'Erro: '. $e->getMessage();
		}
	} // debugMessage()

	/**
	 * Consulta no Banco de Dados
	 * @access public
  	 * @param string $stmt [ statement da consulta ]
  	 * @param array $data [ array de dados ]
  	 * @return object [ resultado da consulta ]
	*/
	public function query( $stmt, $data = null)
	{
		// Seta query do pdo
		$query = $this->pdo->prepare( $stmt );
		$exec = $query->execute( $data );

		// verifica a consulta e retorna erro, se necessário
		if( !$exec ){			
			$error = $query->errorInfo();
			$this->error = $error[2];
			return FALSE;
		}

		// Retorna resultado da consulta
		return $query;
	} // query()

	/**
	 * Insert no Banco de Dados 
	 * @access public
  	 * @param string $table [ Nome da Tabela ]
  	 * @param array, array, array.... [ arrays de dados para inserir ]
  	 * @example insert("tabela", $dados1, $dados2) [$dados devem ter a chave
  	 * com o nome do campo no Banco de Dados e o valor a ser inserido]
  	 * @return
	*/
	public function insert( $table )
	{
		// Prepara o array de colunas
		$cols = array();
		// Prepara o array de valores
		$values = array();
		// Configura o valor inicial do model
		$placeHolders = '(';
		// Contador para configurar as colunas uma única vez
		$c = 1;
		//Obtém do argumentos enviados
		$data = func_get_args();
		// Confere se existe ao menos um array de dados
		if( !isset ( $data[1] ) || !is_array ( $data[1] ) ){
			return;
		}

		// Faz um laço nos argumentos $data
		for( $i = 1; $i < count( $data ); $i++ ){
			// Obtém as chaves como colunas e seus valores
			foreach( $data[$i] as $col => $val ){
				// A primeira volta do laço configura as colunas
				if( $i === 1 ){
					$cols[] = "`$col`";
				}

				// Configura os divisores, se mais de um array de argumentos
				if( $c <> $i ){
					$placeHolders .= '), (';
				}

				// Configura os placeholders do PDO
				$placeHolders .= '?, ';
				//Configura os valores que vamos enviar
				$values[] = $val;
				$c = $i;
			}
			// Remove os caracteres extras dos placeholders
			$placeHolders = substr($placeHolders, 0, strlen($placeHolders) - 2);
		}

		// Junta as colunas por vírgula
		$cols = implode(', ', $cols);
		//Cria a declaração para enviar ap PDO
		$stmt = "INSERT INTO `$table` ( $cols ) VALUES $placeHolders ";
		//Insere os valores
		$insert = $this->query( $stmt, $values );

		//Verificar se a consulta foi realizada
		if( !$insert ){
			return;
		}
		// Verifica se temos o último id enviado
		if( method_exists( $this->pdo, 'lastInsertId') && $this->pdo->lastInsertId() ){
			// Configura o último Id
			$this->lastId = $this->pdo->lastInsertId();
		}
	} // insert()

	/**
	 * Update no Banco de Dados 
	 * @access public
  	 * @param string $table [ Nome da Tabela ]
  	 * @param string $whereField [campo do where]
  	 * @param string $whereValue [valor do where]
  	 * @param array $values [Array de valores que serão atualizados]
  	 * @return
	*/
	public function update($table, $whereField, $whereValue, $values)
	{
		// Verifica se todos os parâmetros foram enviados
		if( empty( $table ) || empty ( $whereField ) || empty( $whereValue ) || !is_array($values) ){
			return;
		}

		//Começa a declaração do statement
		$stmt = "UPDATE `$table` SET ";
		// Configura a declaração do WHERE campo = valor
		$where = " WHERE `$whereField` = ?";
		// Configura o array de valores que serão atualizados
		$set = array();
		// Configura as colunas a atualizar
		foreach ( $values as $column => $value ){
			$set[] = " `$column` = ? ";
		}
		// Junta as colunas por vírgula
		$set = implode(', ',$set);
		// Concatena toda a declaração
		$stmt .= $set . $where;
		// Configura o valor do campo que vamos buscar no WHERE
		$values[] = $whereValue;
		// Garante apenas números nas chaves do array
		$values = array_values($values);

		// Atualiza
		$update = $this->query( $stmt, $values );

		// Verifica se a consulta está OK
		if( $update ){
			// Retorna a consulta
			return $update;
		}
		return;
	} // update()

	/**
	 * Delete no Banco de Dados 
	 * @access public
  	 * @param string $table [ Nome da Tabela ]
  	 * @param string $whereField [campo do where]
  	 * @param string $whereValue [valor do where]
  	 * @return
	*/
	public function delete($table, $whereField, $whereValue)
	{
		// Verifica se todos os parâmetros foram enviados
		if( empty( $table ) || empty( $whereField ) || empty( $whereValue ) ){
			return;
		}
		// Inicia a declaração
		$stmt = "DELETE FROM `$table` ";
		// Configura a declaração WHERE campo =  valor
		$where = " WHERE `$whereField` = ? ";
		// Concatena tudo
		$stmt .= $where;
		// O Valor que vamos buscar no WHERE
		$values = array( $whereValue );

		// Apaga
		$delete = $this->query( $stmt, $value );

		// Verifica se a consulta está OK
		if( $delete ){
			// Retorna a consulta
			return $delete;
		}
		return;
	} // delete()
}