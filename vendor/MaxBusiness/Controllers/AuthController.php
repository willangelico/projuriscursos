<?php

namespace MaxBusiness\Controllers;

use MaxBusiness\Models\DB;
use Phpass\Hash;
use PDO;

class AuthController extends MainController
{
	public function __construct($table, $folder, $accessField)
	{
		parent::__construct();
		$this->phpassHash = new hash;
		$this->table = $table;
		$this->folder = $folder;
		$this->accessField = $accessField;
		if( !$this->isLogged() ){
			// Se não logado efetua redirecionamento para a página de login
	       $this->gotoLogin();
		}
	}

	private function isLogged()
	{						
		 if ( isset( $_COOKIE['userdata'] )
             && ! empty( $_COOKIE['userdata'] ) 
             && ! isset( $_POST['userdata'] )
            ) { 
		 	// Pega os dados de login pelo cookie
            $userdata = $this->getDataCookie(); 
        	// Seta a sessão do usuário
            $this->setSession($userdata);                     
        }

		// Verifica se há uma sessão e se não há uma requisição POST
		if( isset( $_SESSION['userdata'] )
			&& !empty( $_SESSION['userdata'] )
			&& is_array( $_SESSION['userdata'] )
			&& !isset( $_POST['userdata'] )
		 ) { 
			// Pega os dados do usuário da sessão
		 	$userdata = $this->getDataSession();
		 	// Verifica se a sessão do usuário corresponde à sessão atual
			if( session_id() !=  $userdata['user_session_id'] ){
				// Se não mata o login
				$this->dieLogin(INTERNAL_ERROR_SESSION_EXPIRED);
			}
			// Limpa os erros de login
			unset($_SESSION['login_error']);
			// Retorna verdadeiro para a sessão
			return true;
		}

		if ( isset( $_COOKIE['userdata'] )
             && ! empty( $_COOKIE['userdata'] ) 
             && ! isset( $_POST['userdata'] )
            ) { 

			return true;
		}

		if ( isset( $_POST['userdata'] )
             && ! empty( $_POST['userdata'] )
             && is_array( $_POST['userdata'] ) 
            ) {

			$userdata = $this->getDataPost();	
			return $this->checkLogin($userdata);			
		}
	}

	private function getDataPost()
	{
		// Retorna os dados do POST
        return $_POST['userdata'];
	}

	private function getDataSession()
	{
		$query = $this->db->query(
			"SELECT * FROM {$this->table} WHERE id_user = ? LIMIT 1",
			array( $_SESSION['userdata']['id'])
		);

		if( !$query ){
			$this->dieLogin(INTERNAL_ERROR);
		}

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	// Faz Login pelo Cookie
	private function getDataCookie()
	{
		 // Extrai dados do cookie
        $cookie = explode('&',$_COOKIE['userdata']);

        // Consulta se existe a chave
        $query = $this->db->query(
            "SELECT * FROM {$this->table} WHERE id_user = ? LIMIT 1",
            array( base64_decode($cookie[0]))
        );

        // Verifica a consulta
        if ( ! $query ){
            // Mata a Login
            $this->dieLogin(INTERNAL_ERROR);            
        }

        // Retorna os dados da consulta
        return $query->fetch(PDO::FETCH_ASSOC); 
	}


	private function gotoLogin()
	{
		$login_uri = '/'.$this->folder.LOGIN_URI;      
       
       	$_SESSION['goto_url'] = NULL;
        // Pega e seta na sessão a página que o usuário estava
        if( $_SERVER['REQUEST_URI'] !== '/acesso/index/logout'){        	
        	$_SESSION['goto_url'] = urlencode( $_SERVER['REQUEST_URI'] );
        }

        header("Location: {$login_uri}");
	}

	private function checkLogin($userdata)
	{		
		// Extrai variáveis dos dados do usuário
        extract( $userdata );
	
        // Verifica se existe email e senha
        if( ! isset( $email ) || ! isset( $password )){
            // Mata a Login
            $this->dieLogin(INTERNAL_ERROR_NOT_SET_USER_AND_PASS);
        }

        // Verifica se o usuário existe na base de dados
        $query = $this->db->query(
            "SELECT * FROM {$this->table} WHERE {$this->accessField} = ? LIMIT 1",
            array( $email )
        );

        // Verifica a consulta
        if( ! $query ){
            // Mata a Login
            $this->dieLogin(INTERNAL_ERROR);
        }

        // Obtém os dados da consulta
        $fetch = $query->fetch(PDO::FETCH_ASSOC);

        // Obtém o id do usuário
        $id_user = $fetch['id_user'];

        //Verifica se existe ID
        if( empty( $id_user )){   

            $_SESSION['login_error'] = INTERNAL_ERROR_NOT_SET_USER_AND_PASS;            
            return FALSE; 
        }
      
        if( empty($fetch['password'])){
        	$fetch = $this->migratePassword($password, $fetch);	
        }

        // Confere se a senha enviada pelo usuário coincide com o hash do BD
        if( ! $this->phpassHash->checkPassword( $password, $fetch['password'] ) ){              		
      		$this->dieLogin(INTERNAL_ERROR_NOT_SET_USER_AND_PASS);
        }

        // Recria o Id da Sessão
        session_regenerate_id();
        $session_id = session_id();

         // Envia os dados do usuário para a sessão

        $user_session['id']         = $id_user;        
        $user_session['session_id'] = $session_id;
        $user_session['permissions'] = unserialize( $fetch['user_permissions'] );
        $user_session['status']     = $fetch['status'];

        $this->setSession($user_session);

         // Atualiza o id da sessão no BD
        $query = $this->db->query(
            "UPDATE {$this->table} SET user_session_id = ? WHERE id_user = ?",
            array( $session_id, $id_user )
        );

        // Se setado "manter conctado"       
        if( isset( $remember_me ) ){
            //Cria Cookie
            setcookie('userdata',base64_encode($id_user).'&'.base64_encode($session_id),time()+60*60*24*265*10,'/');
        }

        // Verifica se existe uma URL para redirecionar
        if( isset( $_SESSION['goto_url'] ) ){
            // Passa a URL para uma variável
            $goto_url = urldecode( $_SESSION['goto_url'] );

            // Remove a sessão com a URL
            unset( $_SESSION['goto_url'] );

            // Redireciona a página           
            header("Location: {$goto_url}"); 
            exit;
        }
        return true;

	}

	private function setSession($userdata)
	{
		 // Envia os dados do usuário para a sessão
        $_SESSION['userdata']['id']         	= $userdata['id'];
        $_SESSION['userdata']['session_id'] 	= $userdata['session_id'];
        $_SESSION['userdata']['permissions'] 	= unserialize( $userdata['permissions'] );
        $_SESSION['userdata']['status']     	= $userdata['status'];
        $_SESSION['userdata']['folder']			= $this->folder;
        unset($_SESSION['login_error']);
	}

	private function migratePassword($new_password, $fetch)
	{
	
		if( md5($new_password) !== $fetch['old_password']){						
			$this->dieLogin(INTERNAL_ERROR_NOT_SET_USER_AND_PASS);
        }        
   		$fetch['password'] = $this->phpassHash->hashPassword($new_password);        		
   		$this->db->update($this->table, 'id_user', $fetch['id_user'], $fetch);
   		return $fetch;
	}

	private function dieLogin($error)
	{
        $_SESSION['login_error'] = $error;
        // Desconfigura qualquer sessão que possa existir sobre o usuário
        $this->logout();
        die;
	}

	public function logout()
	{		
        // Remove dados do usuário da sessão 
        $_SESSION['userdata'] = array();

        // Forçar remoção
        unset( $_SESSION['userdata'] );

        // Apaga Cookie
        setcookie('userdata','',time()-3600,'/');

        // Regenera o id da sessão
        session_regenerate_id();
		
        // Redireciona para a página de login
        $this->gotoLogin();
	}	
}