<?php

namespace ReusableCog\ErrorDictionaryBundle\DependencyInjection;

use ReusableCog\ErrorDictionaryBundle\Controller\ErrorDictionaryController;
use ReusableCog\ErrorDictionaryBundle\Render\RenderInterface;
use ReusableCog\ErrorDictionaryBundle\Render\TwigRender;
use ReusableCog\ErrorDictionaryBundle\Service\ErrorDictionaryGenerator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

final class ErrorDictionaryExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));

        $loader->load('services.xml');

        $container->registerForAutoconfiguration(RenderInterface::class)
            ->addTag('reusablecog.error_dictionary.filler')
        ;
        $container->register('reusablecog.error_dictionary.filler.config', TwigRender::class)
            ->setPublic(false)
            ->setArguments([
                new Reference('twig'),
                $config['error_definition'],
                $config['title'],
                $config['description'],
            ])
            ->addTag('reusablecog.error_dictionary.filler')
        ;

        $container->register('reusablecog.error_dictionary.generator', ErrorDictionaryGenerator::class)
            ->setArguments([
                new Reference('reusablecog.error_dictionary.filler.config'),
            ])
            ->setPublic(false)
        ;

        $container->register('reusablecog.error_dictionary.controller.render', ErrorDictionaryController::class)
            ->setPublic(true)
            ->setArguments([
                new Reference('reusablecog.error_dictionary.generator'),
            ])
        ;
    }

    public function prepend(ContainerBuilder $container) {}
}
