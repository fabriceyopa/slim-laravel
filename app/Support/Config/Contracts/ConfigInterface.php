<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 07/07/2016
	 * Time: 12:20
	 */
	namespace Fabrice\Support\Contracts;

	interface ConfigInterface{

		/**
		 * Load a setting base on the key
		 * @param $path
		 *
		 * @return mixed
		 */
		public function get($path);
	}