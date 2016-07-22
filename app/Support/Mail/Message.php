<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 14:07
 */

namespace Support\Mail;


use Fabrice\Support\Mail\Contracts\MailInterface;

class Message{
	/**
	 * @var MailInterface
	 */
	protected $mailer;

	/**
	 * Message constructor.
	 */
	public function __construct(MailInterface $mailer) {
		$this->mailer = $mailer;
	}

	public function to($address){
		$this->mailer->to($address);
	}

	public function from($address, $name = ''){
		$this->mailer->from($address, $name);
	}
	public function subject($subject){
		$this->mailer->subject($subject);
	}
	public function body($body){
		$this->mailer->body($body);
	}
}