<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 10:34
 */

namespace Fabrice\Handlers;

use Fabrice\Handlers\Contracts\HandlerInterface;

class CreateVirtualCart implements HandlerInterface{

	public function handle($event) {
		var_dump('Creer le carnet Virtuel');
	}
}