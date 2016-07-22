<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 07/07/2016
	 * Time: 18:20
	 */

	namespace Fabrice\Support\Basket\Exceptions;


	use Exception;

	class QuantityExceededException extends Exception{

		protected $message = 'Vous avez ajouter le nombre maximal pour le produit';

	}