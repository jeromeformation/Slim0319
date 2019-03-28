<?php
namespace App\Controller;

use App\Repository\ProjectRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProjectController
{
    /**
     * @var Twig
     */
    private $twig;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(Twig $twig, ProjectRepository $projectRepository)
    {
        $this->twig = $twig;
        $this->projectRepository = $projectRepository;
    }


    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array|null $args
     * @return ResponseInterface
     * @throws \Exception
     */
    public function show(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {
        $startedAt = new \DateTime('2019-01-01');
        $finishedAt = new \DateTime();

        $project = [
            "id" => 100,
            "name" => "Super site !!!",
            "startedAt" => $startedAt,
            "finishedAt" => $finishedAt,
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
