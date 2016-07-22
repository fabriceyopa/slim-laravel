<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 07/07/2016
	 * Time: 17:03
	 */

	namespace Fabrice\Controllers;


	use Fabrice\Models\Product;

	class ProductController extends BaseController{

		public function get($slug){
			$product = Product::where('slug',$slug)->first();
			if(!$product){
				return $this->redirect('home');
			}
			return $this->render('products/product', compact('product'));
		}
	}