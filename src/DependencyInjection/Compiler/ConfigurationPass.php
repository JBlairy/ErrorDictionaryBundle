<?php

namespace ReusableCog\ErrorDictionaryBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ConfigurationPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if ($container->hasDefinition('twig.loader.native_filesystem')) {
            $bundleDirectory = \dirname(__DIR__, 2);
            $twigFilesystemLoaderDefinition = $container->getDefinition('twig.loader.native_filesystem');
            $twigFilesystemLoaderDefinition->addMethodCall('addPath', [$bundleDirectory . '/../templates', 'ErrorDictionaryBundle']);
        }
    }
}
