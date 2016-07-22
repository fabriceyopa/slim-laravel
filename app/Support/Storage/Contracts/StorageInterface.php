<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 07/07/2016
	 * Time: 17:40
	 */

	namespace Fabrice\Support\Storage\Contracts;


	interface StorageInterface {

		public function get($key);
		public function set($key, $value);
		public function all();
		public function exists($key);
		public function delete($key);
		public function clear();

	}