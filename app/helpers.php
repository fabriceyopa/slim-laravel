<?php
/**
 * Created by PhpStorm.
 * User: nexrillusa
 * Date: 22/07/2016
 * Time: 15:29
 */
if(!function_exists('env')){
	function env($key, $default = ''){
		if(!getenv($key)){
			return $default;
		}
		return getenv($key);
	}
}

