<?php
namespace App\TwigExtension;

use App\Form\FormUtility;
use Slim\Views\TwigExtension;
use Twig\TwigFunction;

class FormExtension extends TwigExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('form_row', [$this, 'formRow'])
        ];
    }

    public function formRow( string $label,
                             string $type,
                             string $id,
                             ?string $placeholder = '')
    {
        $formUtility = new FormUtility();

        return $formUtility->generateHTML($label, $type, $id, $placeholder);
    }
}