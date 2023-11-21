<?php

namespace ReusableCog\ErrorDictionaryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('error_dictionary');

        $treeBuilder
            ->getRootNode()
            ->children()
            ->arrayNode('error_definition')
            ->useAttributeAsKey('key')
            ->prototype('variable')->end()
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
