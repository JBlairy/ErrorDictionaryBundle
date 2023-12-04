<?php

namespace ReusableCog\ErrorDictionaryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('error_dictionary');

        $treeBuilder/* @phpstan-ignore-line */
            ->getRootNode()
            ->children()
            ->scalarNode('title')
            ->defaultValue('Error List')
            ->end()
            ->scalarNode('description')
            ->defaultValue('This list contains the list of possible errors in the application as well as their description')
            ->end()
            ->arrayNode('error_definition')
            ->useAttributeAsKey('key')
            ->prototype('variable')->end()
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
