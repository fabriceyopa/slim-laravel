<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 14:04
 */

namespace Fabrice\Support\Mail;


use Fabrice\Support\Mail\Contracts\MailInterface;
use Slim\Views\Twig;
use Support\Mail\Message;

class Mailer{
	/**
	 * @var MailInterface
	 */
	protected $mailer;
	/**
	 * @var Twig
	 */
	protected $view;

	/**
	 * Mailer constructor.
	 */
	public function __construct(MailInterface $mail, Twig $view) {
		$this->mailer = $mail;
		$this->view = $view;
	}

	public function send($template, $data, $callback){
		$message = new Message($this->mailer);
		$template = $this->view->fetch($template, $data);
		$message->body($template);
		call_user_func($callback, $message);
		$this->mailer->send();
	}
}