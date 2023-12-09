<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

// Crea una nueva instancia de la aplicación Slim
$app = AppFactory::create();

// Configura la ruta base
$app->setBasePath('/api');

// Agrega el middleware de enrutamiento
$app->addRoutingMiddleware();

// Configura el middleware de manejo de errores
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Define una ruta para la URL base
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello World from api!");
    return $response;
});

$app->run();
