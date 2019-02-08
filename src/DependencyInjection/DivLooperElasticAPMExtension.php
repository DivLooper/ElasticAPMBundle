<?php

namespace DivLooper\ElasticAPMBundle\DependencyInjection;

use DivLooper\ElasticAPMBundle\ElasticAPMAgent;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class DivLooperElasticAPMExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');

        $config = $this->processConfiguration(new Configuration(), $configs);

        $definition = $container->getDefinition(ElasticAPMAgent::class);
        $definition->replaceArgument(0, $config);
    }
}
