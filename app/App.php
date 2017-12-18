<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 07/07/2016
	 * Time: 10:23
	 */

	namespace Fabrice;

	use DI\Bridge\Slim\App as DIBridge;
	use DI\ContainerBuilder;

	class App extends DIBridge{
		protected function configureContainer(ContainerBuilder $builder) {
			$builder->addDefinitions([
				'settings.displayErrorDetails' => false,
			]);
			$builder->addDefinitions(__DIR__.'/../config/container.php');
		}
	}