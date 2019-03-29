<?php
namespace App\Controller;

use App\Repository\ProjectRepository;
use Psr\Http\Message\ResponseInterface as IResponse;
use Psr\Http\Message\ServerRequestInterface as IRequest;
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
     * Liste des projets
     * @param IRequest $request
     * @param IResponse $response
     * @param array|null $args
     * @return IResponse
     */
    public function list(IRequest $request, IResponse $response, ?array $args): IResponse
    {
        // Récupération du projet
        $projects = $this->projectRepository->findAll();

        // On retourne une réponse
        return $this->twig->render($response, 'project/list.twig', [
            'projects' => $projects
        ]);
    }

    /**
     * todo: Création d'un projet à implémenter avec formulaire
     * @param IRequest $request
     * @param IResponse $response
     * @param array|null $args
     * @return IResponse
     */
    public function create(IRequest $request, IResponse $response, ?array $args): IResponse
    {
        // On retourne une réponse
        return $this->twig->render($response, 'project/create.twig');
    }

    /**
     * Détail d'un projet grâce à son slug
     * @param IRequest $request
     * @param IResponse $response
     * @param array|null $args - Contient le slug de l'URL
     * @return IResponse
     */
    public function show(IRequest $request, IResponse $response, ?array $args): IResponse
    {
        // Récupération du projet
        $project = $this->projectRepository->findBySlug($args['slug']);

        // On retourne une réponse
        return $this->twig->render($response, 'project/show.twig', [
            'project' => $project
        ]);
    }

}
