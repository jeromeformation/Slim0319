<?php

use Slim\App;

// Autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Création de l'application
$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];
$app = new App($config);

// Configuration du conteneur d'injection de dépendances
require_once dirname(__DIR__) . '/config/container.php';

// Configuration des routes
require_once dirname(__DIR__) . '/config/routes.php';


// Création et renvoi de la réponse au navigateur
$app->run();
