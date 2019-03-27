<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class AboutController
{
    /**
     * @var Twig
     */
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function about(ServerRequestInterface $request, ResponseInterface $response, ?array $args): ResponseInterface
    {
        return $this->twig->render($response, 'about.twig');
    }
}
