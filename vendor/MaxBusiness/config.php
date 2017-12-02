<?php

namespace MaxBusiness;

class Config
{
	public function __construct()
	{
		$this->defaults();
		$this->globalVars();
		$this->defaultMessages();
		$this->security();
		$this->debug();
	}

	private function defaults()
	{		
		// Set Timezone
		date_default_timezone_set('America/Sao_Paulo');
	}

	private function globalVars()
	{
		// Project and Default Title Name
		define( 'NAME', 'Projuris Cursos');
		// Root Path
		define( 'ABSPATH', dirname( __FILE__ ));
		// Path application
		define( 'APPLICATION', '/app' );
		// Path upload dir
		define( 'UP_ABSPATH', ABSPATH . '/public/files' );
		// Home URI
		define( 'HOME_URI', '/' );
		// Main Domain 
		define( 'URL', 'http://www.projuriscursos.com.br' );
		// System Folders
		define( 'FOLDERS', "admin|acesso");
		// URL de Login admin
        define( 'LOGIN_URI', '/login' );        
		// App Namespace
		define( 'APP_NAMESPACE', "App\\");

		// DB Hostname
		define( 'DB_HOST', 'mysql762.umbler.com:41890' );
		// DB Name
		define( 'DB_NAME', '2017projuris_bd' );
		// DB User
		define( 'DB_USER', '2017projuris_use' );
		// DB Pass
		define( 'DB_PASSWORD', 'pro123juris' );
		// DB Charset
		define( 'DB_CHARSET', 'utf8' );

		// E-mail Host
		define( 'MAIL_HOST', '' );
		// E-mail Port
		define( 'MAIL_PORT', '' );
		// E-mail Username
		define( 'MAIL_USER', '' );
		// E-mail Password
		define( 'MAIL_PASSWORD', '' );
		//TLS encryption, `ssl` also accepted do email
        define( 'MAIL_SMTPSecure', 'tls');
        //email recipient
        define( 'MAIL_FROM', 'contato@projuriscursos.com.br');
        //email reply
        define( 'MAIL_REPLY', 'contato@projuriscursos.com.br');

        // Debug 
		define( 'DEBUG', true);

	}

	private function defaultMessages(){
		// Erro Interno
        define( 'INTERNAL_ERROR', 'Erro interno. Tente novamente ou contacte o administrador do sistema.');
        // Sessão Expirada
        define( 'INTERNAL_ERROR_SESSION_EXPIRED', 'Sessão expirada!');
        // Usuário ou senha inválida
        define( 'INTERNAL_ERROR_NOT_SET_USER_AND_PASS', 'Usuário e/ou senha errado. Tente novamente.');
	}

	private function security()
	{
		// Evita que usuários acesse este arquivo diretamente
        if ( ! defined('ABSPATH')) die;
        // Inicia a sessão
        session_start();
	}

	private function debug()
	{
		// Verifica o modo para debugar
        if ( ! defined('DEBUG') || DEBUG === false ) {
            // Esconde todos os erros
            error_reporting(0);
            ini_set("display_errors", 0); 
            exit;            
        } 
        // Mostra todos os erros
        error_reporting(E_ALL);
        ini_set("display_errors", 1); 
	}	
}