<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 09:44
 */

namespace Fabrice\Support\Validation;


use Fabrice\Support\Validation\Contracts\ValidatorInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator implements ValidatorInterface{
	protected $errors = [];

	public function validate(Request $request, array  $rules) {

		foreach ($rules as $field => $rule){
			try{
				$rule->setName(ucfirst($field))->assert($request->getParam($field));
			}catch (NestedValidationException $e){
				$this->errors[$field] = $e->getMessages();
			}
		}

		$_SESSION['errors'] = $this->errors;
		return $this;
	}

	public function failed() {
		return !empty($this->errors);
	}
}