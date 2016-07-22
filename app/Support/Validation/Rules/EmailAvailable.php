<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 11:22
 */

namespace Fabrice\Support\Validation\Exceptions;


use Fabrice\Models\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule{

	public function validate($input) {
		return User::where('email', $input)->count() === 0;
	}
}