<?php

namespace EduardoLedo\JQueryLoadBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class EduardoLedoJQueryLoadExtension extends ConfigurableExtension
{

    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        try {
            $loader->load('services.yml');
        } catch (\Exception $e) {
        }
        $definition = $container->getDefinition('eduardo_ledo_j_query_load');
        $definition->replaceArgument(2, $mergedConfig['global_template']);
        $definition->replaceArgument(3, $mergedConfig['default_charset']);
    }
}
