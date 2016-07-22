<?php
	/**
	 * Created by PhpStorm.
	 * User: UNICOM
	 * Date: 07/07/2016
	 * Time: 10:42
	 */

	namespace Fabrice\Controllers;


	use Fabrice\Support\Auth\Auth;
	use Fabrice\Support\Validation\Contracts\ValidatorInterface;
	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Slim\Flash\Messages;
	use Slim\Router;
	use Slim\Views\Twig;

	class BaseController {

		protected $view;
		/**
		 * @var Router
		 */
		protected $router;
		/**
		 * @var Response
		 */
		protected $response;
		/**
		 * @var Request
		 */
		protected $request;
		/**
		 * @var ValidatorInterface
		 */
		protected $validator;
		/**
		 * @var Auth
		 */
		protected $auth;
		/**
		 * @var Messages
		 */
		protected $flash;

		/**
		 * BaseController constructor. C'est le constructeur de base qui instancie tous ce donc j'ai besoin
		 *
		 * @param Twig $view
		 * @param Router $router
		 * @param Response $response
		 * @param Request $request
		 * @param ValidatorInterface $validator
		 * @param Auth $auth
		 * @param Messages $flash
		 */
		public function __construct(Twig $view, Router $router, Response $response, Request $request, ValidatorInterface $validator, Auth $auth, Messages $flash) {
			$this->view = $view;
			$this->router = $router;
			$this->response = $response;
			$this->request = $request;
			$this->validator = $validator;
			$this->auth = $auth;
			$this->flash = $flash;
		}

		/**
		 * Render a view base the path and the data if isset
		 *
		 * @param          $template
		 * @param array    $data
		 *
		 * @return Response
		 */
		protected function render($template, array $data = []) {
			$view = str_replace('.','/',$template);
			$view .='.twig';
			return $this->view->render($this->response, $view, $data);
		}

		protected function redirect($path) {
			return $this->response->withRedirect($this->router->pathFor($path));
		}



	}