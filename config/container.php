<?php

use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\ProjectController;
use App\Model\Connection;
use App\Repository\ProjectRepository;
use Psr\Container\ContainerInterface;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Twig\Extension\DebugExtension;

// Récupération du conteneur grâce à App
$container = $app->getContainer();

// Configuration de TWIG
$container['view'] = function (ContainerInterface $container) {
    $view = new Twig(dirname(__DIR__) . '/templates', [
        'cache' => false,
        'strict_variables' => true,
        'debug' => true
    ]);

    // Ajout de l'extension de debug de TWIG
    $view->addExtension(new DebugExtension());

    // Extension de base de TWIG
    $router = $container->get('router');
    $uri = Uri::createFromEnvironment(new Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

    // Extensions personnalisées
    $view->addExtension(new \App\TwigExtension\FormExtension($router, $uri));

    return $view;
};

// On définit une clef "ProjectController" pour expliquer au conteneur comment instancier "ProjectController"
// Cette clef sera appelée automatiquement par le routeur
$container[ProjectController::class] = function (ContainerInterface $container) {
    // On retourne une instance de ProjectController en "envoyant" TWIG
    // On obtient TWIG en envoyant la clef "view" du conteneur
    return new ProjectController(
        $container->get('view'),
        $container->get(ProjectRepository::class)
    );
};

$container[ContactController::class] = function (ContainerInterface $container) {
    return new ContactController($container->get('view'));
};
$container[AboutController::class] = function (ContainerInterface $container) {
    return new AboutController($container->get('view'));
};

$container[ProjectRepository::class] = function (ContainerInterface $container) {
    return new ProjectRepository(
        $container->get(Connection::class)
    );
};
$container[Connection::class] = function (ContainerInterface $container) {
    return new Connection(
        $container['settings']['database_name'],
        $container['settings']['database_user'],
        $container['settings']['database_pass']
    );
};