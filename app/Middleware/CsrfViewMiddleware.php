<?php
/**
 * Created by PhpStorm.
 * User: UNICOM
 * Date: 22/06/2016
 * Time: 16:50
 */

namespace Fabrice\Middleware;

class CsrfViewMiddleware extends Middleware{
	public function __invoke($request, $response, $next) {
		$this->view()->getEnvironment()->addGlobal('csrf', ['field' => '
					<input type="hidden" name="' . $this->guard()->getTokenNameKey() . '" value="' . $this->guard()->getTokenName() . '">
					<input type="hidden" name="' . $this->guard()->getTokenValueKey() . '" value="' . $this->guard()->getTokenValue() . '">
				',]);

		return $next($request, $response);
	}
}