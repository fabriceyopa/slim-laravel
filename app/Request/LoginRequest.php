<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 09:56
 */

namespace Fabrice\Request;


use Respect\Validation\Validator as v;

class LoginRequest{
	public static function rules(){
		return [
			'email'=> v::email()->notEmpty()->notBlank(),
			'name'=> v::notBlank()->alpha(' '),
			'password'=> v::notBlank()->notEmpty(),
		];
	}

}