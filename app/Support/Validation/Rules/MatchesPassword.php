<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 24/06/2016
	 * Time: 16:16
	 */

	namespace Fabrice\Support\Validation\Rules;


	use Respect\Validation\Rules\AbstractRule;

	class MatchesPassword extends AbstractRule{
		/**
		 * @var
		 */
		protected $password;


		/**
		 * MatchesPassword constructor.
		 */
		public function __construct($password) {
			$this->password = $password;
		}

		public function validate($input) {
			return password_verify($input, $this->password);
		}
	}