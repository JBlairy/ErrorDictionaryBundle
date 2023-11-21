<?php

namespace ReusableCog\ErrorDictionaryBundle;

use ReusableCog\ErrorDictionaryBundle\DependencyInjection\Compiler\ConfigurationPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ErrorDictionaryBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new ConfigurationPass());
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
