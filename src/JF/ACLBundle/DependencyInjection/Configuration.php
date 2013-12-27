<?php

namespace JF\ACLBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jf_acl');


        $rootNode
                ->children()
                    ->arrayNode('cliente')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('class')->defaultValue('Ephp\ACLBundle\Entity\Cliente')->cannotBeEmpty()->end()
                            ->scalarNode('form')->defaultValue('Ephp\ACLBundle\Form\ClienteType')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
        ;


        return $treeBuilder;
    }
}
