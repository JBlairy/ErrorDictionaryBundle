<?php

namespace ReusableCog\ErrorDictionaryBundle\Service;

use ReusableCog\ErrorDictionaryBundle\Render\TwigRender;

final class ErrorDictionaryGenerator
{
    public function __construct(private readonly TwigRender $configFiller) {}

    public function generate(): string
    {
        return $this->configFiller->render();
    }
}
