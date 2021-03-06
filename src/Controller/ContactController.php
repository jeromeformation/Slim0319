<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class ContactController
{
    /**
     * @var Twig
     */
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function contact(Request $request, Response $response, ?array $args): Response
    {
        return $this->twig->render($response, 'contact.twig');
    }
}
