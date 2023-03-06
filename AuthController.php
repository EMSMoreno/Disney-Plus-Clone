<?php

namespace App\Controllers;

//os recursos da miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {


	public function validar() {
		
		$utilizador = Container::getModel('Utilizador');

		$utilizador->__set('email', $_POST['email']);
		$utilizador->__set('senha', $_POST['senha']);

		$utilizador->validar();

		if($utilizador->__get('id') != '' && $utilizador->__get('nome')) {
			
			session_start();

			$_SESSION['id'] = $utilizador->__get('id');
			$_SESSION['nome'] = $utilizador->__get('nome');

			header('Location: /timeline');

		} else {
			header('Location: /login');
		}

	}

	public function sair() {
		session_start();
		session_destroy();
		header('Location: /');
	}
}