<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\BlogController as Blog;
use App\Controllers\ContactoController;

$app = AppFactory::create();
$twig = Twig::create('..\templates',['cache'=>false]);

// Add Slim routing middleware
$app->addRoutingMiddleware();

// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$app->add(new BasePathMiddleware($app));
$app->add(TwigMiddleware::create($app,$twig));
$app->addErrorMiddleware(true, true, true);

// Define app routes
$app->get('/',HomeController::class.':index' )->setName('root');
$app->get('/contacto', ContactoController::class.':index');
$app->post('/contacto/enviar', ContactoController::class.':enviar');
$app->get('/blog', Blog::class.':index');
$app->get('/blog_leer', Blog::class.':leerPost');

// Run app
$app->run();
