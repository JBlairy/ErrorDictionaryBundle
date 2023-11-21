<?php

namespace ReusableCog\ErrorDictionaryBundle\Render;

use InvalidArgumentException;
use Twig\Environment;
use Twig_Environment;

final class TwigRender implements RenderInterface
{
    /** @var Environment|Twig_Environment */
    private $twig;

    public function __construct($twig, private readonly mixed $errorDefinition)
    {
        if (!$twig instanceof Twig_Environment && !$twig instanceof Environment) {
            throw new InvalidArgumentException(sprintf('Providing an instance of "%s" as twig is not supported.', $twig::class));
        }
        $this->twig = $twig;
    }

    public function render(): string
    {
        return $this->twig->render(
            '@ErrorDictionaryBundle/index.html.twig',
            [
                'data' => $this->errorDefinition,
            ]
        );
    }
}
