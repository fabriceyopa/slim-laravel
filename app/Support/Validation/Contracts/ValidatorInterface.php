<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 09:42
 */

namespace Fabrice\Support\Validation\Contracts;


use Psr\Http\Message\ServerRequestInterface as Request;

interface  ValidatorInterface{

	public function validate(Request $request, array  $rules);
	public function failed();

}