<?php

namespace ReusableCog\ErrorDictionaryBundle\Controller;

use ReusableCog\ErrorDictionaryBundle\Service\ErrorDictionaryGenerator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ErrorDictionaryController
{
    public function __construct(private readonly ErrorDictionaryGenerator $errorDictionaryGenerator) {}

    public function __invoke(Request $request)
    {
        return new Response($this->errorDictionaryGenerator->generate());
    }
}
