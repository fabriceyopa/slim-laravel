<?php
/**
 * Created by PhpStorm.
 * User: UNICOM
 * Date: 07/07/2016
 * Time: 10:22
 */

use Dotenv\Dotenv;
use Fabrice\App;
use Fabrice\Middleware\CsrfViewMiddleware;
use Fabrice\Middleware\OldInputMiddleware;
use Fabrice\Middleware\ValidationErrorsMiddleware;
use Illuminate\Database\Capsule\Manager as Capsule;
use Noodlehaus\Config;
use Respect\Validation\Validator as v;

session_start();
require __DIR__ . '/../vendor/autoload.php';

//Gestion des variables d'environnement
$dotenv = new Dotenv(__DIR__ . '/../');
$dotenv->load();

$app = new App();
$container = $app->getContainer();
$config = new Config(__DIR__ . '/../config/database.php');
$db = $config->get('db');

// Gestion de la base de donnees avec Eloquent
$capsule = new Capsule();
$capsule->addConnection($db);

$capsule->setAsGlobal();
$capsule->bootEloquent();

require __DIR__ . '/../app/routes.php';

$app->add(new ValidationErrorsMiddleware($container));
$app->add(new OldInputMiddleware($container));
//$app->add(new CsrfViewMiddleware($container));
v::with('Fabrice\\Support\\Validation\\Rules');

