<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 24/06/2016
	 * Time: 16:33
	 */

	namespace Fabrice\Middleware;

	class GuestMiddleware extends Middleware{

		public function __invoke($request, $response, $next) {
			if($this->auth()->check()){
				return $response->withRedirect($this->router()->pathFor('home'));
			}
			return $next($request, $response);
		}
	}