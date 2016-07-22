<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 10:46
 */

namespace Fabrice\Handlers;

use Fabrice\Handlers\Contracts\HandlerInterface;

class SendWelcomeMail implements HandlerInterface
{

	public function handle($event) {
		var_dump('Envoid du mail de Bienvenu');
	}
}