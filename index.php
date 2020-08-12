<?php
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

/**
 * Namespace do Controller
 */

$router->namespace("Source\App");

/**
 * Usuarios
 */

$router->group(null);
$router->get("/", "Web:main");

/**
 * 
 * Rotas de teste
 */

$router->group('teste');
$router->get('/', 'Teste:teste');

$router->group('api');
$router->get('/', "Api:getAllComments");
$router->post('/store', 'Api:addComment');
$router->get('/{id}', 'Api:destroy');

$router->dispatch();


