<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 11:37
 */

namespace Fabrice\Middleware;

class AuthMiddleware extends Middleware{

	public function __invoke($request, $response, $next) {
		if(!$this->auth()->check()){
			return $response->withRedirect($this->router()->pathFor('auth.signin'));
		}
		return $next($request, $response);
	}

}