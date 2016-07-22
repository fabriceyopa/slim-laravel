<?php
/**
 * Created by PhpStorm.
 * User: UNICOM
 * Date: 07/07/2016
 * Time: 10:24
 */
use Fabrice\Models\Product;
use Fabrice\Support\Auth\Auth;
use Fabrice\Support\Basket\Basket;
use Fabrice\Support\Storage\Contracts\StorageInterface;
use Fabrice\Support\Storage\SessionStorage;
use Fabrice\Support\Validation\Contracts\ValidatorInterface;
use Fabrice\Support\Validation\Validator;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use function DI\get;

return ['router' => get(Slim\Router::class), Twig::class => function (ContainerInterface $c) {
	$twig = new Twig(__DIR__ . '/../resources/views', ['cache' => false,]);
	$twig->addExtension(new TwigExtension($c->get('router'), $c->get('request')->getUri()));
	$twig->getEnvironment()->addGlobal('basket', $c->get(Basket::class));
	$twig->getEnvironment()->addGlobal('flash', $c->get(Messages::class));
	$twig->getEnvironment()->addGlobal('auth', [
		'check' => $c->get(Auth::class)->check(),
		'user'  => $c->get(Auth::class)->user(),
	]);
	return $twig;
},
	ResponseInterface::class => function (ContainerInterface $c) {
	$headers = new Headers(['Content-Type' => 'text/html; charset=UTF-8']);
	$response = new Response(200, $headers);
	return $response->withProtocolVersion($c->get('settings')['httpVersion']);

}, ServerRequestInterface::class => function (ContainerInterface $c) {
	return Request::createFromEnvironment($c->get('environment'));
}, Product::class => function (ContainerInterface $c) {
	return new Product();
}, StorageInterface::class => function (ContainerInterface $c) {
	return new SessionStorage('cart');
}, Basket::class => function (ContainerInterface $c) {
	return new Basket($c->get(StorageInterface::class), $c->get(Product::class));
}, ValidatorInterface::class => function (ContainerInterface $c) {
	return new Validator();
}, Auth::class => function (ContainerInterface $c) {
	return new Auth();
}, Guard::class => function (ContainerInterface $c) {
	return new Guard();
},
	Messages::class => function(ContainerInterface $c){
	return new Messages();
	}
];