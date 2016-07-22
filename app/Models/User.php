<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 11:15
 */

namespace Fabrice\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model{

	protected  $fillable = ['name','email','password'];

	public function setPassword($password){
		$this->update([
			'password'=>password_hash($password, PASSWORD_DEFAULT)
		]);
	}

}