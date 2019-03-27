<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
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

    public function contact(ServerRequestInterface $request, ResponseInterface $response, ?array $args): ResponseInterface
    {
        return $this->twig->render($response, 'contact.twig');
    }
}
