<?php
/**
 * Created by PhpStorm.
 * User: UNICOM
 * Date: 07/07/2016
 * Time: 15:53
 */

namespace Fabrice\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model{

	public function hasLowStock(){
		if($this->outOfStock()){
			return false;
		}
		return (bool)($this->stock <= 5);
	}

	public function outOfStock(){
		return $this->stock === 0;
	}

	public function inStock(){
		return $this->stock >= 1;
	}

	public function hasStock($quantity){
		return $this->stock >= $quantity;
	}

}