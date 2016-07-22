<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 10:19
 */

namespace Fabrice\Middleware;

use Fabrice\Support\Auth\Auth;
use Slim\Csrf\Guard;
use Slim\Views\Twig;

class Middleware{
	protected $container;


	/**
	 * Middleware constructor.
	 */
	public function __construct($container) {
		$this->container = $container;
	}

	protected function view(){
		return $this->container->get(Twig::class);
	}
	protected function auth(){
		return $this->container->get(Auth::class);
	}

	protected function guard(){
		return $this->container->get(Guard::class);
	}

	protected function router(){
		return $this->container->get('router');
	}
}