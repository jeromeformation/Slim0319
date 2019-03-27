<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\ProjectController;

// Page d'accueil
$route = $app->get("/", function (ServerRequestInterface $request, ResponseInterface $response, ?array $args) {
    return $this->view->render($response, 'home.twig');
});
$route->setName('homepage');

// Groupe des routes du projet
$app->group('/projet', function () {
    // Page de création
    $this->get("/creation", ProjectController::class .':create')->setName('app_project_create');

    // Création d'une page de détail
    $this->get("/{id:\d+}", ProjectController::class .':show')->setName('app_project_show');
});

// Page de contact
$app->get('/contact',ContactController::class .':contact')->setName('app_contact');

// Page à propos
$app->get('/a-propos', AboutController::class . ':about')->setName('app_about');
