<?php

namespace App\Controllers;

//os recursos da miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {
	public function login() {
		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('login');
			
	
	}
	public function index() {
	
	
		$this->render('index');
	}


	public function inscreverse() {

		$this->view->utilizador = array(
				'nome' => '',
				'email' => '',
				'senha' => '',
			);

		$this->view->erroinscricao = false;

		$this->render('inscreverse');
	}

	public function registrar() {

		$utilizador = Container::getModel('utilizador');

		$utilizador->__set('nome', $_POST['nome']);
		$utilizador->__set('email', $_POST['email']);
		$utilizador->__set('senha', $_POST['senha']);

		
		if($utilizador->validarinscricao() && count($utilizador->getutilizadorPorEmail()) == 0) {
		
				$utilizador->salvar();

				$this->render('inscricao');

		} else {

			$this->view->utilizador = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
			);

			$this->view->erroinscricao = true;

			$this->render('inscreverse');
		}

	}

}


?>