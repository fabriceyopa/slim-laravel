<?php
/**
 * Created by PhpStorm.
 * User: UNICOM
 * Date: 07/07/2016
 * Time: 10:26
 */
use Fabrice\Middleware\AuthMiddleware;
use Fabrice\Middleware\GuestMiddleware;

$app->get('/', ['Fabrice\Controllers\HomeController', 'index'])->setName('home');
$app->get('/products/{slug}', ['Fabrice\Controllers\ProductController', 'get'])->setName('product.get');
$app->get('/cart', ['Fabrice\Controllers\CartController', 'index'])->setName('cart.index');
$app->get('/cart/add/{slug}/{quantity}', ['Fabrice\Controllers\CartController', 'add'])->setName('cart.add');
$app->post('/cart/update/{slug}', ['Fabrice\Controllers\CartController', 'update'])->setName('cart.update');

// Liens qui ne sont pas accessibles pour un membre inscris, donc juste pour les visiteurs
$app->group('', function () {
	$this->get('/auth/signup', ['Fabrice\Controllers\Auth\AuthController', 'getSignUp'])->setName('auth.signup');
	$this->post('/auth/signup', ['Fabrice\Controllers\Auth\AuthController', 'postSignUp']);

	$this->get('/auth/signin', ['Fabrice\Controllers\Auth\AuthController', 'getSignIn'])->setName('auth.signin');
	$this->post('/auth/signin', ['Fabrice\Controllers\Auth\AuthController', 'postSignIn']);
})->add(new GuestMiddleware($container));

//Protection des liens pour tous les utilisations qui sont connectes
$app->group('', function () {

	$this->get('/auth/logout',['Fabrice\Controllers\Auth\AuthController', 'getLogOut'])->setName('auth.logout');
	$this->get('/auth/password/change', ['Fabrice\Controllers\Auth\PasswordController', 'getChangePassword'])->setName('auth.password.change');
	$this->post('/auth/password/change',['Fabrice\Controllers\Auth\PasswordController', 'postChangePassword']);
})->add(new AuthMiddleware($container));