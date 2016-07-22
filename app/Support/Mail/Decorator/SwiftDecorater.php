<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 14:17
 */

namespace Fabrice\Support\Mail\Decorator;


use Fabrice\Support\Mail\Contracts\MailInterface;
use PHPMailer;

class SwiftDecorater implements MailInterface{
	/**
	 * @var PHPMailer
	 */
	protected $mailer;

	/**
	 * SwiftDecorater constructor.
	 */
	public function __construct(PHPMailer $mailer, array $config) {
		$this->mailer = $mailer;
	}

	private function load(){

	}

	public function to($address, $name = '') {

	}

	public function from($address, $name = '') {
		// TODO: Implement from() method.
	}

	public function subject($subject) {
		// TODO: Implement subject() method.
	}

	public function body($body) {
		// TODO: Implement body() method.
	}

	public function send() {
		// TODO: Implement send() method.
	}
}