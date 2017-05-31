<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 07/07/2016
	 * Time: 10:39
	 */

	namespace Fabrice\Controllers;

	use Fabrice\Events\UserWasCreated;
	use Fabrice\Models\Product;
	use Fabrice\Handlers\CreateVirtualCart;
	use Fabrice\Handlers\SendWelcomeMail;

	class HomeController extends BaseController{

		public function index(){
//			$event = new UserWasCreated();
//			$event->attach([
//				new CreateVirtualCart,
//				new SendWelcomeMail
//			]);
//			$event->dispatch();
			return $this->render('home');
		}


	}
