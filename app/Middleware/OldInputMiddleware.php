<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 10:15
 */

namespace Fabrice\Middleware;

class OldInputMiddleware extends Middleware{

	public function __invoke($request, $response, $next) {
		if(isset($_SESSION['old'])){
			$this->view()->getEnvironment()->addGlobal('old',$_SESSION['old']);
		}
		$_SESSION['old'] = $request->getParams();
		return $next($request, $response);
	}

}