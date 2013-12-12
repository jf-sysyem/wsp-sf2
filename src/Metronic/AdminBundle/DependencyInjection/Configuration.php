<?php

namespace Metronic\AdminBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link }
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('metronic_admin');

        $rootNode
                ->children()
                    ->scalarNode('logo_big')->example('/bundles/metronicadmin/img/logo_big.png')->cannotBeEmpty()->end()
                    ->scalarNode('logo')->example('/bundles/metronicadmin/img/logo.png')->cannotBeEmpty()->end()
                    ->scalarNode('notification')->defaultValue(true)->cannotBeEmpty()->end()
                    ->scalarNode('inbox')->defaultValue(true)->cannotBeEmpty()->end()
                    ->scalarNode('todo')->defaultValue(true)->cannotBeEmpty()->end()
                    ->scalarNode('user')->defaultValue(true)->cannotBeEmpty()->end()
                ->end()
        ;


        return $treeBuilder;
    }
}
