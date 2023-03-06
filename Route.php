<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);
		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);

		$routes['inscreverse'] = array(
			'route' => '/inscreverse',
			'controller' => 'indexController',
			'action' => 'inscreverse'
		);

		$routes['inscricao'] = array(
			'route' => '/inscricao',
			'controller' => 'indexController',
			'action' => 'inscricao'
		);

		$routes['validar'] = array(
			'route' => '/validar',
			'controller' => 'AuthController',
			'action' => 'validar'
		);

		$routes['timeline'] = array(
			'route' => '/timeline',
			'controller' => 'AppController',
			'action' => 'timeline'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);

		$this->setRoutes($routes);
	}

}

?>