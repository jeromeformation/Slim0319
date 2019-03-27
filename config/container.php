<?php

use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\ProjectController;
use Psr\Container\ContainerInterface;

// Récupération du conteneur grâce à App
$container = $app->getContainer();

// Configuration de TWIG
$container['view'] = function (ContainerInterface $container) {
    $view = new \Slim\Views\Twig(dirname(__DIR__) . '/templates', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

    return $view;
};

// On définit une clef "ProjectController" pour expliquer au conteneur comment instancier "ProjectController"
// Cette clef sera appelée automatiquement par le routeur
$container[ProjectController::class] = function (ContainerInterface $container) {
    // On retourne une instance de ProjectController en "envoyant" TWIG
    // On obtient TWIG en envoyant la clef "view" du conteneur
    return new ProjectController($container->get('view'));
};

$container[ContactController::class] = function (ContainerInterface $container) {
    return new ContactController($container->get('view'));
};
$container[AboutController::class] = function (ContainerInterface $container) {
    return new AboutController($container->get('view'));
};
