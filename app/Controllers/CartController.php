<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 07/07/2016
	 * Time: 17:34
	 */

	namespace Fabrice\Controllers;


	use Fabrice\Models\Product;
	use Fabrice\Support\Basket\Basket;
	use Fabrice\Support\Basket\Exceptions\QuantityExceededException;

	class CartController extends BaseController{

		public function index(Basket $basket){
		    $basket->refresh();
			return $this->render('cart/index');
		}

		public function add($slug, $quantity, Basket $basket){
			$product = Product::where('slug',$slug)->first();
			if(!$product){
				return $this->redirect('home');
			}
			try{
				$basket->add($product,$quantity);
			}catch(QuantityExceededException $e){

			}
			return $this->redirect('cart.index');
		}

		public function update($slug, Basket $basket){
            $product = Product::where('slug',$slug)->first();
            if(!$product){
                return $this->redirect('home');
            }
           try{
                $basket->update($product, $this->request->getParam('quantity'));
           }catch (QuantityExceededException $e){

           }
            return $this->redirect('cart.index');
        }

	}