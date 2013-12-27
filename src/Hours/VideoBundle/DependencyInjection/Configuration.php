<?php

namespace Hours\VideoBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('hours_video');

        $rootNode
                ->children()
                    ->arrayNode('social')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('twitter')->defaultValue(false)->example('http://www.twitter.com')->cannotBeEmpty()->end()
                            ->scalarNode('facebook')->defaultValue(false)->example('http://www.facebook.com')->cannotBeEmpty()->end()
                            ->scalarNode('google')->defaultValue(false)->example('http://plus.google.com')->cannotBeEmpty()->end()
                            ->scalarNode('linkedin')->defaultValue(false)->example('http://www.liinkedin.com')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                    ->arrayNode('youtube')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('video')->defaultValue('V7ICWa1_u3I')->example('V7ICWa1_u3I')->cannotBeEmpty()->end()
                            ->scalarNode('autoPlay')->defaultValue(true)->cannotBeEmpty()->end()
                            ->scalarNode('mute')->defaultValue(true)->cannotBeEmpty()->end()
                            ->scalarNode('startAt')->defaultValue(0)->cannotBeEmpty()->end()
                            ->scalarNode('opacity')->defaultValue(1)->cannotBeEmpty()->end()
                            ->scalarNode('loop')->defaultValue(true)->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                    ->arrayNode('subscribe')
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('route')->defaultValue('hv_subscribe')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
        ;
        return $treeBuilder;
    }
}
