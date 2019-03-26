<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProjectController
{
    public function show(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {
        // On retourne une réponse
        return $response->getBody()->write('<h1>Détail du projet</h1>');
    }

    public function create(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {
        // On retourne une réponse
        return $response->getBody()->write('<h1>Création d\'un projet</h1>');
    }
}
