<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 24/06/2016
	 * Time: 15:59
	 */

	namespace Fabrice\Controllers\Auth;

	use Fabrice\Controllers\BaseController;
	use Respect\Validation\Validator as v;

	class PasswordController extends BaseController {

		public function getChangePassword() {
			return $this->render('auth.password.change');
		}

		public function postChangePassword() {
			$validation = $this->validator->validate($this->request, [
				'password_old' => v::notEmpty()->noWhitespace()->matchesPassword($this->auth->user()->password),
				'password'=> v::notEmpty()->noWhitespace()
			]);

			if($validation->failed()){
				return $this->redirect('auth.password.change');
			}

			$this->auth->user()->setPassword($this->request->getParam('password'));
			return $this->redirect('home');
		}
	}