<?php

namespace Pumukit\Cmar\LiveBundle\DependencyInjection;

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
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('pumukit_cmar_live');

        $rootNode
          ->children()
            ->arrayNode('chat')
              ->isRequired()
              ->addDefaultsIfNotSet()
              ->children()
                ->booleanNode('enable')->isRequired()
                  ->defaultFalse()
                  ->info('Enable chat in live channel')
                ->end()
                ->integerNode('update_interval')
                  ->defaultValue(5000)
                  ->info('Interval in milliseconds to refresh the content of the chat.')
                ->end()
              ->end()
            ->end()
          ->end()
          ;

        return $treeBuilder;
    }
}
