<?php

namespace DivLooper\ElasticAPMBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('divـlooper_elastic_apm');

        $treeBuilder->getRootNode()
            ->children()
                ->booleanNode('enabled')->defaultTrue()->end()
                ->scalarNode('app_name')->defaultValue('Symfony App')->end()
                ->scalarNode('app_version')->defaultValue('1.0')->end()
                ->scalarNode('elastic_apm_server')->defaultValue('http://localhost:8200')->end()
                ->scalarNode('secret_token')->defaultValue(null)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
