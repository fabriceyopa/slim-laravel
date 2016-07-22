<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 14:01
 */

namespace Fabrice\Support\Mail\Contracts;


interface MailInterface{

	public function to($address, $name ='');
	public function from($address, $name = '');
	public function subject($subject);
	public function body($body);
	public function send();
}