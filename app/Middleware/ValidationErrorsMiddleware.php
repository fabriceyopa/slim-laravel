<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 10:04
 */

namespace Fabrice\Middleware;

class ValidationErrorsMiddleware extends Middleware{

	public function __invoke($request, $response, $next) {
		if(isset($_SESSION['errors'])){
			$this->view()->getEnvironment()->addGlobal('errors',$_SESSION['errors']);
			unset($_SESSION['errors']);
		}
		return $next($request, $response);
	}

}