<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 11:27
 */

namespace Fabrice\Support\Auth;

use Fabrice\Models\User;

class Auth{

	public function user(){
		if(!isset($_SESSION['user'])){
			return null;
		}
		return User::find($_SESSION['user']);
	}

	public function check(){
		return isset($_SESSION['user']);
	}

	public function attempt($email, $password){

		$user = User::where('email',$email)->first();
		if(!$user){
			return false;
		}
		if(password_verify($password, $user->password)){
			$_SESSION['user'] = $user->id;
			return true;
		}
		return false;
	}

	public function logout(){
		unset($_SESSION['user']);
	}
}