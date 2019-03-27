<?php

use Slim\App;

// Autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Configuration globale de l'application
$config = require dirname(__DIR__) . '/config/config.php';

// Création de l'application
$app = new App($config);

// Configuration du conteneur d'injection de dépendances
require_once dirname(__DIR__) . '/config/container.php';

// Configuration des routes
require_once dirname(__DIR__) . '/config/routes.php';

// Création et renvoi de la réponse au navigateur
$app->run();
