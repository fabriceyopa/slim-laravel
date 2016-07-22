<?php
/**
 * Created by PhpStorm.
 * User: UNICOM
 * Date: 22/06/2016
 * Time: 16:26
 */

namespace Fabrice\Support\Validation\Exceptions;


use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException{

	public static $defaultTemplates = [self::MODE_DEFAULT => [self::STANDARD => "Cette adresse est déjà utilisé",],];

}