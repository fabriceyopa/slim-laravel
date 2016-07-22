<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 24/06/2016
	 * Time: 16:16
	 */

	namespace Fabrice\Support\Validation\Exceptions;


	use Respect\Validation\Exceptions\ValidationException;

	class MatchesPasswordException extends ValidationException{

		public static $defaultTemplates = [
			self::MODE_DEFAULT => [
				self::STANDARD => "Votre ancien mot de passe est incorrecte",
			],
		];

	}