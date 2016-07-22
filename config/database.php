<?php
	return [
		'db'       => [
			'driver'    => 'mysql',
			'host'      => env('DB_HOST','localhost'),
			'database'  => env('DB_DATABASE','test'),
			'username'  => env('DB_USERNAME','root'),
			'password'  => env('DB_PASSWORD',''),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		],
		'settings' => [
			'displayErrorDetails' => true,
		],
	];

