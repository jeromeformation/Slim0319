<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProjectController
{
    /**
     * @var Twig
     */
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {

        $project = [
            "id" => 100,
            "name" => "Super site !!!",
            "startedAt" => '2019-01-01',
            "finishedAt" => '2019-03-27',
            "description" => <<<EOT
<h2>Site avec Slim Framework</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias, dignissimos distinctio dolor, eaque 
facilis fuga incidunt iusto nemo nulla perferendis placeat possimus provident  repellat sapiente tenetur totam, vero
voluptas?</p>
EOT
            ,
            "image" => "site.png",
            "languages" => ["html5", "css3", "php7.1", "sql"]
        ];

        // On retourne une réponse
        return $this->twig->render($response, 'project/show.twig', [
            'project' => $project
        ]);
    }

    public function create(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {
        // On retourne une réponse
        return $response->getBody()->write('<h1>Création d\'un projet</h1>');
    }
}
