<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

// Autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Création de l'application
$app = new App();

// Création d'une route
$route = $app->get("/", function (ServerRequestInterface $request, ResponseInterface $response, ?array $args) {
    // On retourne une réponse
    return $response->getBody()->write('<h1>Bonjour</h1>');
});
$route->setName('homepage');

$app->group('/projet', function () {
    // Création d'une page de détail des projets
    // Nouveauté : on ajoute une variable dans l'URL avec les accolades
    $this->get("/{id:\d+}", function (ServerRequestInterface $request, ResponseInterface $response, ?array $args) {
        // On retourne une réponse
        return $response->getBody()->write('<h1>Détail du projet</h1>');
    })->setName('app_project_show');

    // Page de création
    $this->get("/creation", function (ServerRequestInterface $request, ResponseInterface $response, ?array $args) {
        // On retourne une réponse
        return $response->getBody()->write('<h1>Création d\'un projet</h1>');
    })->setName('app_project_create');
});





// Création et renvoi de la réponse au navigateur
$app->run();
