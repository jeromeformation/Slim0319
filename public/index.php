<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

// Autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Création de l'application
$app = new App();

// Création d'une route
$app->get("/hello", function (
    ServerRequestInterface $request,
    ResponseInterface $response,
    ?array $args
) {
        // On retourne une réponse
        return $response->getBody()->write('<h1>Bonjour</h1>');
});

// Création et renvoi de la réponse au navigateur
$app->run();
