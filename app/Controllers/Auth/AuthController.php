<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 11:10
 */

namespace Fabrice\Controllers\Auth;


use Fabrice\Controllers\BaseController;
use Fabrice\Models\User;
use Fabrice\Request\LoginRequest;

class AuthController extends BaseController{
	public function getSignUp(){
		return $this->render('auth.signup');
	}
	public function postSignUp(){
		$validation = $this->validator->validate($this->request,LoginRequest::rules());
		if($validation->failed()){
			return $this->redirect('auth.signup');
		}
		$user = User::create([
			'email'=>$this->request->getParam('email'),
			'name'=>$this->request->getParam('name'),
			'password'=>password_hash($this->request->getParam('password'),PASSWORD_DEFAULT),
		]);

		$this->auth->attempt($user->email, $this->request->getParam('password'));
		$this->flash->addMessage('succes','Votre compte a été crée avec succés');
		return $this->redirect('home');
	}

	public function getSignIn(){
		return $this->render('auth.signin');
	}
	public function postSignIn(){
		$auth = $this->auth->attempt(
			$this->request->getParam('email'),
			$this->request->getParam('password')
		);

		if(!$auth){
			$this->flash->addMessage('error',"Aucun n'enregistrement ne correspond a ces informations");
			return $this->redirect('auth.signin');
		}
		$this->flash->addMessage('succes','Vous avez été connecté avec succés');
		return $this->redirect('home');
	}

	public function getLogOut(){
		$this->auth->logout();
		$this->flash->addMessage('succes','Voous êtes déconnecté avec succés');
		return $this->redirect('home');
	}
}